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
            "SENHA" => $this->request->getPost("SENHA"),
            "TELEFONE" => $this->request->getPost("TELEFONE"),
            "DESCRICAO_USER" => $this->request->getPost("DESCRICAO_USER"),
        ];

        $this->UsuarioModel->save($data);

        $this->response->redirect(base_url("/cadastro"));
    }

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

    
}
