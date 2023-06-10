<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'USUARIO';
    protected $primaryKey = 'ID_CONTA';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['NOME', 'EMAIL', 'SENHA', 'TELEFONE', 'DESCRICAO_USER'];
    protected $returnType = 'object';

    public function verificaUsuarioExiste($data)
    {
        return $this->db->query('SELECT * FROM USUARIO WHERE EMAIL = "' . $data['EMAIL'] . '";')->getRow();
    }

    public function verificaSenha($data) {
        return $this->db->query('SELECT NOME FROM USUARIO WHERE EMAIL = "' . $data['EMAIL'] . '" AND SENHA = "' . $data['SENHA'] . '";')->getRow();
    }

    public function deletarUsuario($idUsuario)
    {
        $this->db->query('DELETE FROM POST WHERE ID_CONTA = '. $idUsuario .';');
        $this->db->query('DELETE FROM USUARIO WHERE ID_CONTA = '. $idUsuario .';');
    }

    public function Aprovar($ID_POST)
    {
        $this->db->query('UPDATE POST SET APROVADO = 1 WHERE ID_POST = '. $ID_POST .';');
    }

    public function EnviarEmail($userEmail, $postTitle, $mensagem)
    {
        $email = \Config\Services::email();

        $email->setFrom('HelpLink@hotmail.com', 'HelpLink Administration');
        $email->setTo($userEmail);
        // CC
        // BCC

        $email->setSubject('Seu post:"'. $postTitle. '" foi negado pelas seguintes razões');
        $email->setMessage($mensagem);

        $email->send();
    }

    public function Negar($ID_CONTA, $ID_POST, $mensagem)
    {
        # não haverá nenhuma modificação no post, ele será apagado e um email enviado ao usuário
        $postTitle = $this->db->query('SELECT TITULO FROM POST WHERE ID_POST = '. $ID_POST .';');

        $this->db->query('DELETE FROM POST WHERE ID_POST = '. $ID_POST .';');

        $userEmail = $this->db->query('SELECT EMAIL FROM USUARIO WHERE ID_CONTA = '. $ID_CONTA .';');
        
        $this->EnviarEmail($userEmail, $postTitle, $mensagem);
    }

    
}
