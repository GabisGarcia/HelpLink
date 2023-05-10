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

        public function listarPesquisa($data)
        {
            $pesquisa = ''; // $data['Pesquisa'];
            $tag = '2';// $data['Tags'];

            if(isset($pesquisa) && isset($tags)){
                $resultado = $this->db->query('SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG = '. $tag .' AND TITULO LIKE "'. $pesquisa . '")');
            }elseif($pesquisa == ''){
                $resultado = $this->db->query('SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG = '. $tag .')');
            }else{
                $resultado = $this->db->query('SELECT * FROM POST WHERE TITULO LIKE "'. $pesquisa . '"');
            }
            // if ($pesquisa != ''){
            //     $resultado = $this->db->query('SELECT * FROM POST WHERE TITULO LIKE "'. $pesquisa . '"');
            // }else if($tag != ''){
            //     $resultado = $this->db->query('SELECT * FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG = '. $tag .')');
            // }

            foreach ($resultado->getResult('array') as $row) {
                echo $row['TITULO'];
                echo "<br>";
                echo $row['DESCRICAO'];
                echo "<br>";
                var_dump($resultado);
            }
        }
    }