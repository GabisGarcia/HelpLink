<?php

namespace App\Controllers;

class PostController extends BaseController
{
    private $PostModel;
    /*
    public function __construct() {
        $this->PostModel = new \App\Models\PostModel();
    }
    */
    public function postar()
    {
        $data = [
            'TITULO' => $this->request->getPost('TITULO'),
            'DESCRICAO' => $this->request->getPost('DESCRICAO'),
            'VALOR' => $this->request->getPost('VALOR'),
            'DOACAO' => $this->request->getPost('DOACAO'),
            'CONTATO' => $this->request->getPost('CONTATO'),
        ];

        $this->PostModel->save($data);
        $this->response->redirect(base_url("welcome")); // provalvemente n sera redirecionado a pagina inicial mas deixaremos assim por enquanto
    }

    public function deletar($idPost)
    {
        $this->PostModel->delete($idPost);
        $this->response->redirect(base_url("welcome"));
    }
}
?>