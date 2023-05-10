<?php

namespace App\Controllers;

class PostController extends BaseController
{
    private $PostModel;

    public function __construct() {
        $this->PostModel = new \App\Models\PostModel();
    }
    
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
        $this->response->redirect(base_url("Home"));
    }

    public function post_edit($idPost)
    {
        
        $post = $this->PostModel->find($idPost);

        return view('post_edit', [
            'post' => $post,
        ]);

    }

    public function editar($idPost)
    {
        $data = [
            'TITULO' => $this->request->getPost('TITULO'),
            'DESCRICAO' => $this->request->getPost('DESCRICAO'),
            'VALOR' => $this->request->getPost('VALOR'),
            'DOACAO' => $this->request->getPost('DOACAO'),
            'CONTATO' => $this->request->getPost('CONTATO'),
        ];

        $this->PostModel->update($idPost, $data);

        $this->response->redirect(base_url("welcome"));
    }

    public function listar($pesquisa, $tag)
    {
        /*/if($pesquisa = '' && $tag = []){
            return print('Pesquisa vazia favor preenche-la');
        }*/


        $this->PostModel->listarPesquisa($pesquisa, $tag);
/*
        $info = ['post' => $this->PostModel->like('TITULO', $pesquisa)];
        
        var_dump($info);*/
    }
}
?>