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
                return [];
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
                $resultado = $this->db->query('SELECT u.ID_CONTA, p.TITULO, p.DESCRICAO, p.VALOR, p.DOACAO, p.CONTATO, p.POST_DATE FROM usuario u, POST p FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ' . $consulta .' AND TITULO LIKE "%'. $pesquisa . '%");');
                return  $this->listarRes($resultado);
            }elseif($pesquisa == '' && $tags != []){
                $resultado = $this->db->query('SELECT u.ID_CONTA, p.TITULO, p.DESCRICAO, p.VALOR, p.DOACAO, p.CONTATO, p.POST_DATE FROM usuario u, POST p FROM POST WHERE ID_POST IN (SELECT ID_POST FROM post_tag WHERE ID_TAG IN (' . $consulta .' GROUP BY ID_POST HAVING COUNT(ID_POST) = '. sizeof($tags) .');');
                return  $this->listarRes($resultado);
            }elseif($pesquisa != '' && $tags == []){
                $resultado = $this->db->query('SELECT u.ID_CONTA, p.TITULO, p.DESCRICAO, p.VALOR, p.DOACAO, p.CONTATO, p.POST_DATE FROM usuario u, POST p FROM POST WHERE TITULO LIKE "'. $pesquisa . '";');
                return  $this->listarRes($resultado);
            }else{
                return [];
            }
        }

        public function listarInicial(){
            $resultado = $this->db->query('SELECT ID_POST, TITULO, DESCRICAO, VALOR, DOACAO, CONTATO, POST_DATE, REPUTACAO FROM POST WHERE POST_DATE < NOW() - 7 LIMIT 5');
            $posts = $this->listarRes($resultado);
            if(!$posts || !isset($posts)) {
                echo "<h1>NAO TEM POST</h1>";
                return [];
            }

            return $posts;

        }

        public function like($idPost, $idConta)
        {
            $this->db->query('INSERT INTO LIKES (ID_POST, ID_CONTA) VALUES ('. $idPost . ', ' . $idConta . ');');
            $this->db->query('UPDATE POST SET REPUTACAO = REPUTACAO + 1 WHERE ID_POST = '. $idPost .';');
        }

        public function dislike($idPost, $idConta)
        {
            $this->db->query('DELETE FROM LIKES WHERE ID_POST = '. $idPost . ' AND ID_CONTA=' . $idConta . ';');
            $this->db->query('UPDATE POST SET REPUTACAO = REPUTACAO - 1 WHERE ID_POST = '. $idPost .';');
        }

        public function listarPostUsuario($idUsuario) {
            $resultado = $this->db->query('SELECT * FROM POST WHERE ID_CONTA = '. $idUsuario . ';');
            $posts = $this->listarRes($resultado);
            if(!$posts || !isset($posts)) {
                echo "<h1>NAO TEM POST</h1>";
                return [];
            }

            return $posts;
        }

        public function listarCurtidas($idConta) {
            $resultado = $this->db->query("SELECT ID_POST FROM LIKES WHERE ID_CONTA = ". $idConta . ";");
            return $resultado->getResult();
        }

        public function listarAdminView()
        {
            $resultado = $this->db->query("SELECT * FROM POST WHERE APROVADO = 0");
            $posts = $this->listarRes($resultado);
            if(!$posts || !isset($posts)) {
                echo "<h1>NAO TEM POST</h1>";
                return [];
            }

            return $posts;
        }

        public function aprovar($ID_POST)
        {
            $this->db->query('UPDATE POST SET APROVADO = 1 WHERE ID_POST = '. $ID_POST .';');
        }

        public function EnviarEmail($userEmail, $postTitle, $mensagem)
        {
            $email = \Config\Services::email();

            $email->setFrom('HelpLink@hotmail.com', 'HelpLink Administration');
            $email->setTo($userEmail);

            $email->setSubject('Seu post:"'. $postTitle. '" foi negado pelas seguintes razões');
            $email->setMessage($mensagem);

            $email->send();
        }

        public function negar($ID_CONTA, $ID_POST, $mensagem)
        {
            # não haverá nenhuma modificação no post, ele será apagado e um email enviado ao usuário
            $postTitle = $this->db->query('SELECT TITULO FROM POST WHERE ID_POST = '. $ID_POST .';');

            $this->db->query('DELETE FROM POST WHERE ID_POST = '. $ID_POST .';');

            $userEmail = $this->db->query('SELECT EMAIL FROM USUARIO WHERE ID_CONTA = '. $ID_CONTA .';');
            
            $this->EnviarEmail($userEmail, $postTitle, $mensagem);
        }

}
