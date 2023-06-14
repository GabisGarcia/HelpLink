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
        $this->UsuarioModel->alterarSenha($ID_CONTA, $novaSenha);
        $this->response->redirect(base_url("/funfo"));
    }

    public function checarSenha($ID_CONTA, $senhaInserida)
    {
        $senhaInserida = md5($senhaInserida);
        if($this->UsuarioModel->checarSenha($ID_CONTA, $senhaInserida)){
            $this->response->redirect(base_url("/alterarSenha")); 
        }

        $this->response->redirect(base_url("/faio"));
    }
}
