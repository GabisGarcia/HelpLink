<?php

    namespace App\Models;

    use CodeIgniter\Model;
use CodeIgniter\Validation\StrictRules\CreditCardRules;

    class PostModel extends Model
    {
        protected $table = 'POST';
        protected $primaryKey = 'ID_POST';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['TITULO', 'DESCRICAO', 'VALOR', 'DOACAO', 'CONTATO', 'ID_CONTA'];
        protected $returnType = 'object';

        private function listarRes($resultado)
        {
            if($resultado->getRow() == null){
                return "<h1>Não há post</h1>";
            }else{  
                // foreach ($resultado->getResult('array') as $row) {
                //     //var_dump($resultado);
                //     // echo $row['TITULO'];
                //     // echo "<br>";
                //     // echo $row['DESCRICAO'];
                //     // echo "<br>";
                //     // echo $row['VALOR'];
                //     // echo "<br>";
                //     $posts = [$row];
                //     var_dump($posts);
                //     return $row;
                // }
                // var_dump($resultado);
                $foo = [$resultado->getResult()];
                $post = $foo[0];
                return $post;
            }
        }
        

        public function listarPesquisa($data)
        {
            $pesquisa = $data['Pesquisa'];
            $tags = $data['Tags'];
            $consulta = "";


            if(sizeof($tags) > 1) {
                for($i = 0; $i < sizeof($tags); $i++) {
                    if($i == (sizeof($tags) - 1)) {
                        $consulta .= "{$tags[$i]}) ";
                    } else {
                        $consulta .= "{$tags[$i]}, ";

                    }
                }
            } else if(sizeof($tags) == 1){
                $consulta .= "{$tags[0]}) ";
            }else{
                $consulta = $consulta;
            }
            
            if($pesquisa != '' && $tags != []){
                echo "tem dois<br>";
                echo 'SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ' . $consulta .' AND TITULO LIKE "%'. $pesquisa . '%");';
                $resultado = $this->db->query('SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ' . $consulta .' AND TITULO LIKE "%'. $pesquisa . '%");');
                return  $this->listarRes($resultado);
            }elseif($pesquisa == '' && $tags != []){
                echo "tem tag<br>";
                echo 'SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG IN ('. $consulta .'GROUP BY ID_POST HAVING COUNT(ID_POST) = '. sizeof($tags) .');';
                $resultado = $this->db->query('SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG IN (' . $consulta .' GROUP BY ID_POST HAVING COUNT(ID_POST) = '. sizeof($tags) .');');
                return  $this->listarRes($resultado);
            }elseif($pesquisa != '' && $tags == []){
                echo "tem pesquisa<br>";
                echo 'SELECT * FROM POST WHERE TITULO LIKE "'. $pesquisa . '";';
                $resultado = $this->db->query('SELECT * FROM POST WHERE TITULO LIKE "'. $pesquisa . '";');
                return  $this->listarRes($resultado);
            }else{
                return "<h1>Não há post</h1>";
            }
        }

        public function listarInicial()
        {
            $resultado = $this->db->query('SELECT * FROM POST WHERE POST_DATE > NOW() - 7');

            return $this->listarRes($resultado);
        }
    }
