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

    public function criarCodigo()
    {
        $codigo = $this->rand(1000, 9999);
        return md5($codigo);
    }

    public function enviarEmail($emailInserido)
    {
        $codigo = 10;//$this->criarCodigo();
        var_dump($codigo);
        $hora = 10;//$this->db->query('SELECT NOW();');


        $email = \Config\Services::email();
        
        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'sandbox.smtp.mailtrap.io',
            'SMTPUser' => '5bb30114e93ebc',
            'SMTPPass' => '7c98abf957e92e',
            'SMTPPort' => 25,
            'wordWrap' => true,
            'newline' => "\r\n",
        ];

        $email->initialize($config);

        $email->setFrom('Gabrielrm813@gmail.com', 'HelpLink Administration');
        $email->setTo('Gabriel-rodrigues-martins@hotmail.com');

        $email->setSubject('Requisicao de mudanca de senha');
        /*$email->setMessage("Uma requisição de mudança de email foi feita nesta data e hora :". $hora ."<br> 
                            Se não foi você que fez esta requisição você pode ignorar essa menssagem<br>
                            Caso tenha sido realmente você que requeriu, este é o código:". $codigo ."<br>
                            Favor incerilo dentro de 10 minutos<br>
                            Atenciosamente, HelpLink Administration");*/

        $email->setMessage('Funcionou!!!!');

        if (! $email->send()) {
           var_dump($email->printDebugger());
        }
    }
}
