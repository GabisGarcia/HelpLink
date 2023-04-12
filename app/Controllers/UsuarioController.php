<?php

namespace App\Controllers;
use new \App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    private $UsuarioModel;

    public function __construct() {
        $this->UsuarioModel = UsuarioModel();
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

        return view('cadastro');
    }
}
