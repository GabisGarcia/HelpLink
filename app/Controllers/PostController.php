<?php

namespace App\Controllers;

class PostController extends BaseController
{
    private $PostModel;
    private $PostTagModel;

    public function __construct() {
        $this->PostModel = new \App\Models\PostModel();
        $this->PostTagModel = new \App\Models\Post_tagModel();
    }
    
    public function postar()
    {
        $tags = $this->request->getPost('TAGS');
        $data = [
            'TITULO' => $this->request->getPost('TITULO'),
            'DESCRICAO' => $this->request->getPost('DESCRICAO'),
            'VALOR' => $this->request->getPost('VALOR'),
            'DOACAO' => $this->request->getPost('DOACAO'),
            'CONTATO' => $this->request->getPost('CONTATO'),
        ];
        $this->PostModel->save($data);
        $this->PostTagModel->CriarRelacao($tags);
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

    public function listarPesquisa()
    {
        $data = [
            'Pesquisa'=> $this->request->getPost('Pesquisa'),
            'Tags' => $this->request->getPost('Tags')
        ];

        $post = $this->PostModel->listarPesquisa($data);

        return view('lista(?)', [
            'post' => $post,
        ]);
    }

    public function like($idPost)
    {
        $this->PostModel->like($idPost);
        // $this->response->redirect(base_url("")); // n sei pra onde mandar
    }

    public function dislike($idPost)
    {
        $this->PostModel->dislike($idPost);
        // $this->response->redirect(base_url("")); // n sei pra onde mandar
    }
}
?>