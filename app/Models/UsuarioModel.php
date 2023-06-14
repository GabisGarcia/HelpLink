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
}
