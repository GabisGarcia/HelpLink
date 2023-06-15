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

    public function putCodigo($codigo, $email){
        $ID_CONTA = $this->db->query('SELECT ID_CONTA FROM USUARIO WHERE EMAIL = "'. $email . '";');
        $this->db->query('INSERT INTO CODIGOS (ID_CONTA, CODIGO) VALUES ('. $ID_CONTA .', '. $codigo .');');
    }


    public function enviarEmail($emailInserido, $codigo)
    {
        $data = $this->db->query('SELECT NOW() AS tempo;')->getRow();
        $data = $data->tempo;
        
        $email = \Config\Services::email();
        
        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'sandbox.smtp.mailtrap.io',
            'SMTPUser' => '1c3803a3371d0a',
            'SMTPPass' => '4abde1e5ed71c8',
            'SMTPPort' => 25,
            'wordWrap' => true,
            'newline' => "\r\n",
        ];

        $email->initialize($config);

        $email->setFrom('Gabrielrm813@gmail.com', 'HelpLink Administration');
        $email->setTo($emailInserido);

        $email->setSubject('Requisicao de mudanca de senha');
        $email->setMessage("Uma requisição de mudança de email foi feita nesta data e data :". $data ."<br> 
                            Se não foi você que fez esta requisição você pode ignorar essa menssagem<br>
                            Caso tenha sido realmente você que requeriu, este é o código:". $codigo ."<br>
                            Favor incerilo dentro de 10 minutos<br>
                            Atenciosamente, HelpLink Administration");


        if (! $email->send()) {
           var_dump($email->printDebugger());
        }
    }

    public function checarCodigo($codigoInserido, $ID_CONTA){
        if($this->db->query('SELECT CODIGO FROM CODIGOS WHERE CODIGO = '. $codigoInserido .' AND ID_CONTA = '. $ID_CONTA .''));
    }
}
