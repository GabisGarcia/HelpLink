<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class TagsModel extends Model
    {
        protected $table = 'TAGS';
        protected $primaryKey = 'ID_TAG';
        protected $useAutoIncrement = true;      
        protected $returnType = 'object';
    }