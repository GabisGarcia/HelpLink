<?php

namespace App\Controllers;

use Models\UsuarioModel;

class CadastroController extends BaseController
{
    private $UsuarioModel;

    public function __construct() {
        $this->UsuarioModel = new UsuarioModel();
    }

    public function adicionar()
    {

        $data = [
            "EMAIL" => $this->request->getPost("EMAIL"),
            "SENHA" => $this->request->getPost("SENHA"),
            "TELEFONE" => $this->request->getPost("TELEFONE"),
            "DESCRICAO_USER" => $this->request->getPost("DESCRICAO_USER"),
        ];

        $this->UsuarioModel->save($data);

        return view('cadastro');
    }
}
