<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PostModel extends Model
    {
        protected $table = 'POST';
        protected $primaryKey = 'ID_POST';
        //protected $foreignkey = ['ID_CONTA']; PESQUISAR SOBRE...
        protected $useAutoIncrement = true;
        protected $allowedFields = ['TITULO', 'DESCRICAO', 'VALOR', 'DOACAO', 'CONTATO'];
        protected $returnType = 'object';
    }