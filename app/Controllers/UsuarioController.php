<?php

namespace App\Controllers;
use \App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    private $UsuarioModel;

    public function __construct() {
        $this->UsuarioModel = new UsuarioModel();
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

        $this->UsuarioModel->save($data);

        $this->response->redirect(base_url("/login"));
    }

    public function login() {

        $data = [
            "EMAIL" => $this->request->getPost("EMAIL"),
            "SENHA" => md5($this->request->getPost("SENHA")),
        ];

        $session = session();

        if($this->UsuarioModel->verificaUsuarioExiste($data)) {
            if($this->UsuarioModel->verificaSenha($data)) {
                $session->set('user', $this->UsuarioModel->verificaUsuarioExiste($data));
                $this->response->redirect(base_url("/"));
            } else {
                $this->response->redirect(base_url("/login"));
            }
        } else {
            $this->response->redirect(base_url("/login"));
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();
        $this->response->redirect(base_url("/login"));
    }
//LUCAS, FAVOR INSERIR O NEGÓCIO PRA FUNFAR 

    public function alterar() {
        $data = [
            "ID_CONTA" => $this->request->getPost("ID_CONTA"),
            "NOME" => $this->request->getPost("NOME"),
            "EMAIL" => $this->request->getPost("EMAIL"),
            "SENHA" => $this->request->getPost("SENHA"),
            "TELEFONE" => $this->request->getPost("TELEFONE"),
            "DESCRICAO_USER" => $this->request->getPost("DESCRICAO_USER"),
        ];

        $this->UsuarioModel->save($data);

        $this->response->redirect(base_url("/posts"));
    }

    public function deletarUsuario($IdUsuario)
    {
        $this->UsuarioModel->deletarUsuario($IdUsuario);
        $this->response->redirect(base_url("/cadastro"));
    }    

    public function Aprovar($ID_POST)
    {
        $this->UsuarioModel->Aprovar($ID_POST);
    }

    public function Negar($ID_CONTA, $ID_POST, $mensagem)
    {
        $this->UsuarioModel->Negar($ID_CONTA, $ID_POST, $mensagem);
    }
}
