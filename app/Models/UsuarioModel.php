<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'USUARIO';
    protected $primaryKey = 'ID_CONTA';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['ID_CONTA', 'NOME', 'EMAIL', 'SENHA', 'TELEFONE', 'DESCRICAO_USER'];
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
    
    public function checarSenha($ID_CONTA, $senhaInserida){
        $senha = $this->db->query('SELECT SENHA FROM USUARIO WHERE ID_CONTA = '. $ID_CONTA .';');
        if($senhaInserida != $senha){
            return false;
        }
        return true;
    }

    public function alterarSenha($ID_CONTA, $novaSenha)
    {
        $this->db->query('UPDATE USUARIO SET SENHA = "'. $novaSenha .'" WHERE $ID_CONTA = '. $ID_CONTA .';');
    }

    public function checarEmail($emailInserido)
    {
        $resultado = $this->db->query('SELECT EMAIL FROM USUARIO WHERE EMAIL = "'. $emailInserido .'";')->getRow();
        if($resultado){
            return true;
        }
        return false;
    }

    public function enviarEmail($emailInserido)
    {
        $email = \Config\Services::email();
        $hora = $this->db->query('SELECT NOW();');
        
        $email->setFrom('HelpLink@hotmail.com', 'HelpLink Administration');
        $email->setTo($emailInserido);

        $email->setSubject('Requisição de mudança de senha');
        $email->setMessage("Uma requisição de mudança de email foi feita nesta data e hora :". $hora ."<br> 
                            Se não foi você que fez esta requisição você pode ignorar essa menssagem<br>
                            Caso tenha sido este é o código requerido:");
    }
}
