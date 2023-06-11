<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class TagsModel extends Model
    {
        protected $table = 'TAGS';
        protected $primaryKey = 'ID_TAG';
        protected $allowedFields = ['NOME'];
        protected $useAutoIncrement = true;      
        protected $returnType = 'object';

        public function getTags()
        {
            $resultado = $this->db->query('SELECT * FROM TAGS');
            return $resultado->getResult();
        }

    }