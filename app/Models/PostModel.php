<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PostModel extends Model
    {
        protected $table = 'POST';
        protected $primaryKey = 'ID_POST';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['TITULO', 'DESCRICAO', 'VALOR', 'DOACAO', 'CONTATO', 'ID_CONTA'];
        protected $returnType = 'object';

        private function listarRes($resultado)
        {
            foreach ($resultado->getResult('array') as $row) {
                if($row == []){
                    echo "<h1>Não há post</h1>";
                }
                echo $row['TITULO'];
                echo "<br>";
                echo $row['DESCRICAO'];
                echo "<br>";
                var_dump($resultado);
            }
        }

        public function listarPesquisa($data)
        {
            $pesquisa = ''; // $data['Pesquisa'];
            $tag = '1';// $data['Tags'];

            if(isset($pesquisa) && isset($tags)){
                $resultado = $this->db->query('SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG = '. $tag .' AND TITULO LIKE "'. $pesquisa . '")');
                $this->listarRes($resultado);
            }elseif($pesquisa == '' && $tag != ''){
                $resultado = $this->db->query('SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG = '. $tag .')');
                $this->listarRes($resultado);
            }elseif($pesquisa != '' && $tag == ''){
                $resultado = $this->db->query('SELECT * FROM POST WHERE TITULO LIKE "'. $pesquisa . '"');
                $this->listarRes($resultado);
            }else{
                echo "<h1>Não há post</h1>";
            }
        }
    }