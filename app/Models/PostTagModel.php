<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PostTagModel extends Model
    {
        protected $table = 'POST_TAG';
        protected $allowedFields = ['ID_TAG', 'ID_POST'];
        protected $returnType = 'object';

        public function CriarRelacao($tags)
        {
            $idPost = $this->db->query('SELECT ID_POST FROM POST ORDER BY ID_POST DESC LIMIT 1');
            $idPost = $idPost->getRow()->ID_POST;
            foreach($tags as $tag){    
                $this->db->query('INSERT INTO POST_TAG VALUES ('. $idPost .','. $tag .');');
            }
        }
    }