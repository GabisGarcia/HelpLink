<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PostModel extends Model
    {
        protected $table = 'POST';
        protected $primaryKey = 'ID_POST';
        //protected $foreignkey = ['ID_CONTA']; PESQUISAR SOBRE...
        protected $useAutoIncrement = true;
        protected $allowedFields = ['TITULO', 'DESCRICAO', 'VALOR', 'DOACAO', 'CONTATO', 'ID_CONTA'];
        protected $returnType = 'object';

        public function listarPesquisa($pesquisa)
        {
            $resultado = $this->db->query('SELECT * FROM post WHERE TITULO LIKE "'. $pesquisa . '"');

            foreach ($resultado->getResult('array') as $row) {
                echo $row['TITULO'];
                echo "<br>";
                echo $row['DESCRICAO'];
            }
        }
    }