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
                echo 'SELECT TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ' . $consulta .' AND TITULO LIKE "%'. $pesquisa . '%");';
                $resultado = $this->db->query('SELECT TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ' . $consulta .' AND TITULO LIKE "%'. $pesquisa . '%");');
                return  $this->listarRes($resultado);
            }elseif($pesquisa == '' && $tags != []){
                echo "tem tag<br>";
                echo 'SELECT TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG IN ('. $consulta .'GROUP BY ID_POST HAVING COUNT(ID_POST) = '. sizeof($tags) .');';
                $resultado = $this->db->query('SELECT TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG IN (' . $consulta .' GROUP BY ID_POST HAVING COUNT(ID_POST) = '. sizeof($tags) .');');
                return  $this->listarRes($resultado);
            }elseif($pesquisa != '' && $tags == []){
                echo "tem pesquisa<br>";
                echo 'SELECT TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE FROM POST WHERE TITULO LIKE "'. $pesquisa . '";';
                $resultado = $this->db->query('SELECT TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE FROM POST WHERE TITULO LIKE "'. $pesquisa . '";');
                return  $this->listarRes($resultado);
            }else{
                echo "<h1>Não há post</h1>";
                return [];
            }
        }

        public function listarInicial(){
            $resultado = $this->db->query('SELECT TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE, REPUTACAO FROM POST WHERE POST_DATE < NOW() - 7 LIMIT 5');
            $posts = $this->listarRes($resultado);
            
            if(!$posts || !isset($posts)) {
                echo "<h1>NAO TEM POST</h1>";
                return [];
            }

            return $posts;

        }
}
