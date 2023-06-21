<?php

namespace App\Controllers;

use \App\Models\UsuarioModel;
use CodeIgniter\CodeIgniter;

class UsuarioController extends BaseController
{
    private $UsuarioModel;
    private $session;

    public function __construct()
    {
        $this->UsuarioModel = new UsuarioModel();
        $this->session = session();
    }

    public function adicionar()
    {

        $data = [
            "NOME" => $this->request->getPost("NOME"),
            "EMAIL" => $this->request->getPost("EMAIL"),
            "SENHA" => md5($this->request->getPost("SENHA")),
            "TELEFONE" => $this->request->getPost("TELEFONE"),
            "DESCRICAO_USER" => $this->request->getPost("DESCRICAO_USER"),
        ];

        try {
            $this->UsuarioModel->save($data);

            return json_encode(["status" => "ok", "message" => "Usuário cadastrado com sucesso!", "data" => $data]);
        } catch (\Exception $e) {
            return json_encode(["status" => "error", "message" => $e, "data" => $data]);
        }
    }

    public function login()
    {

        $data = [
            "EMAIL" => $this->request->getPost("EMAIL"),
            "SENHA" => md5($this->request->getPost("SENHA")),
        ];


        if ($this->UsuarioModel->verificaUsuarioExiste($data)) {
            if ($this->UsuarioModel->verificaSenha($data)) {
                $this->session->set('user', $this->UsuarioModel->verificaUsuarioExiste($data));
                $this->response->redirect(base_url("/"));
            } else {
                $this->response->redirect(base_url("/login"));
            }
        } else {
            $this->response->redirect(base_url("/login"));
        }
    }

    public function logout()
    {
        $this->session->destroy();
        $this->response->redirect(base_url("/login"));
    }

    public function alterar()
    {
        $data = [
            "ID_CONTA" => $this->request->getPost("ID_CONTA"),
            "NOME" => $this->request->getPost("NOME"),
            "EMAIL" => $this->request->getPost("EMAIL"),
            "TELEFONE" => $this->request->getPost("TELEFONE"),
            "DESCRICAO_USER" => $this->request->getPost("DESCRICAO_USER"),
        ];
 
        $this->UsuarioModel->save($data);

        $this->response->redirect(base_url("/configuracoesperfil"));
    }

    public function deletarUsuario()
    {
        $IdUsuario = $this->request->getPost('ID_CONTA');
        $this->session->destroy();
        $this->UsuarioModel->deletarUsuario($IdUsuario);
        $this->response->redirect(base_url("/login"));
    }
    
    public function alterarSenha()
    {
        $emailUsuario = $this->request->getPost('emailUsuario');
        $novaSenha = $this->request->getPost('novaSenha');
        $novaSenha = md5($novaSenha);

        $this->UsuarioModel->alterarSenha($emailUsuario, $novaSenha);
        $this->response->redirect(base_url("/meuperfil"));
    }

    public function checarSenha()
    {
        $ID_CONTA = $this->request->getPost('ID_CONTA');
        $senhaInserida = $this->request->getPost('senhaAtual');

        $senhaInserida = md5($senhaInserida);
        if($this->UsuarioModel->checarSenha($ID_CONTA, $senhaInserida)){
            $this->response->redirect(base_url("/alterar_senha")); 

        }else{
            $this->response->redirect(base_url("/editarsenha"));
        }

    }

    public function criarCodigo($emailInserido)
    {
        $codigo = rand(1000, 9999);
        $this->UsuarioModel->deleteCodigo($emailInserido);
        $this->UsuarioModel->putCodigo($codigo, $emailInserido);
        return $codigo;
    }

    public function checarCodigo(){
        $codigoInserido = $this->request->getPost('codigoInserido');
        $email = $this->request->getPost('email');
        if($this->UsuarioModel->checarCodigo($codigoInserido, $email)){
            $this->UsuarioModel->deleteCodigo($email);
            $ID_CONTA = $this->UsuarioModel->GetIdByEmail($email);
            $this->response->redirect(base_url("/alterar_senha", ["ID_CONTA" => $ID_CONTA]));
        }else{
            $this->response->redirect(base_url("/falha"));
        }
    }

    public function checarEmail()
    {
        $emailInserido = $this->request->getPost("EMAIL");
        if($this->UsuarioModel->checarEmail($emailInserido)){
            $codigo = $this->criarCodigo($emailInserido);
            $this->UsuarioModel->enviarEmail($emailInserido, $codigo);

            $this->response->redirect(base_url("/emailenviado", ['email' => $emailInserido]));
        }else{
            $this->response->redirect(base_url("/falhaaochecaremail"));
        }     
    }
}
