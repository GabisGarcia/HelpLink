<?php

namespace App\Controllers;

class PostController extends BaseController
{
    private $PostModel;
    private $PostTagModel;
    private $TagModel;

    public function __construct() {
        $this->PostModel = new \App\Models\PostModel();
        $this->PostTagModel = new \App\Models\PostTagModel();
        $this->TagModel = new \App\Models\TagsModel();
    }
    
    public function postar()
    {
        $session = session();
        $usuario = $session->get('user');
        $qtsTags = sizeof($this->TagModel->getTags());
        $tags = [];

        for($i = 0; $i <= $qtsTags; $i++) {
            $tagId = 'TAGS'.$i;
            
            if($this->request->getPost($tagId) != null) {
                array_push($tags, $this->request->getPost($tagId));
            } 
        }


        $data = [
            'ID_CONTA' => $usuario->ID_CONTA,
            'TITULO' => $this->request->getPost('TITULO'),
            'DESCRICAO' => $this->request->getPost('DESCRICAO'),
            'VALOR' => $this->request->getPost('VALOR'),
            'DOACAO' => $this->request->getPost('DOACAO'),
            'CONTATO' => $this->request->getPost('CONTATO'),
        ];
        $this->PostModel->save($data);
        $this->PostTagModel->CriarRelacao($tags);
        $this->response->redirect(base_url());

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

    public function like($idPost, $idConta)
    {
        $this->PostModel->like($idPost,$idConta);
        $this->response->redirect(base_url());
    }

    public function dislike($idPost, $idConta)
    {
        $this->PostModel->dislike($idPost, $idConta);
        $this->response->redirect(base_url());

    }

    public function listarAdminView()
    {
        $post = $this->PostModel->listarAdminView();

        return view('listaAdimin(?)', [
            'post' => $post,
        ]);
    }

    public function Aprovar($ID_POST)
    {
        $this->PostModel->Aprovar($ID_POST);
        $this->response->redirect(base_url('PostController/listarAdminView'));
    }

    public function Negar($ID_CONTA, $ID_POST, $mensagem)
    {
        $this->PostModel->Negar($ID_CONTA, $ID_POST, $mensagem);
        $this->response->redirect(base_url('PostController/listarAdminView'));
    }
}
