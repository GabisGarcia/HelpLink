<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class PostTagModel extends Model
    {
        protected $table = 'POST_TAG';
        protected $allowedFields = ['ID_TAG', 'ID_POST'];
        protected $returnType = 'object';

        public function CriarRelacao($tags, $idPostParam)
        {
            $idPost = ($idPostParam) ? $idPostParam : $this->db->query('SELECT ID_POST FROM POST ORDER BY ID_POST DESC LIMIT 1')->getRow()->ID_POST;
            
            $this->db->query('DELETE FROM POST_TAG WHERE ID_POST = '. $idPost .';');

            foreach($tags as $tag){    
                $this->db->query('INSERT INTO POST_TAG VALUES ('. $idPost .','. $tag .');');
            }
        }

        public function listarTags($idPost)
        {
            $resultado = $this->db->query('SELECT NOME FROM TAGS WHERE ID_TAG IN (SELECT ID_TAG FROM POST_TAG WHERE ID_POST = '. $idPost .');');
            return $resultado->getResult();
        }

        public function tagsPost($idPost) {
            $resultado = $this->db->query('SELECT ID_TAG FROM POST_TAG WHERE ID_POST = '. $idPost . ';')->getResult();
            return $resultado;
        }
    }