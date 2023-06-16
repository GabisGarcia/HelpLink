<?php

namespace App\Controllers;

use \App\Models\UsuarioModel;

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
            return json_encode(["status" => "error", "message" => "Erro ao cadastrar usuário!", "data" => $data]);
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

    public function deletarUsuario($IdUsuario)
    {
        $this->UsuarioModel->deletarUsuario($IdUsuario);
        $this->response->redirect(base_url("/cadastro"));
    }
    
    public function alterarSenha($ID_CONTA, $novaSenha)
    {
        $data = [
            "ID_CONTA" => $this->request->getPost('idUsuario'),
            "novaSenha" => $this->request->getPost('senhaAtual'),
        ];

        $this->UsuarioModel->alterarSenha($data["ID_CONTA"], $data["novaSenha"]);
        $this->response->redirect(base_url("/funfo"));
    }

    public function checarSenha()
    {
        $data = [
            "ID_CONTA" => $this->request->getPost('ID_CONTA'),
            "senhaInserida" => $this->request->getPost('senhaAtual'),
        ];
        $ID_CONTA = $data["ID_CONTA"];
        $senhaInserida = $data["senhaInserida"];

        $senhaInserida = md5($senhaInserida);
        var_dump($ID_CONTA);
        if($this->UsuarioModel->checarSenha($ID_CONTA, $senhaInserida)){
            $this->response->redirect(base_url("/alterar_senha")); 
        }

        $this->response->redirect(base_url("/editarsenha"));
    }

    public function criarCodigo($emailInserido)
    {
        $codigo = rand(1000, 9999);
        $this->UsuarioModel->putCodigo($codigo, $emailInserido);
        return $codigo;
    }

    public function checarCodigo($codigoInserido, $ID_CONTA){
        // to-do
    }

    public function checarEmail()
    {
        $emailInserido = 'b.123@teste.com';
        /*$emailInserido = [
            $this->request->getPost("EMAIL"),
        ];*/
        $aa = $this->UsuarioModel->checarEmail($emailInserido);
        echo !$aa;
        if($this->UsuarioModel->checarEmail($emailInserido)){
            echo "dentro do if";
            $codigo = $this->criarCodigo($emailInserido);
            $this->UsuarioModel->enviarEmail($emailInserido, $codigo);

            // $this->response->redirect(base_url("/emailenviado"));
        }

        // $this->response->redirect(base_url("/falhaaochecaremail"));
        
    }
}
