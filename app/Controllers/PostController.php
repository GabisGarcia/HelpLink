<?php

namespace App\Controllers;


class PostController extends BaseController
{
    private $PostModel;
    private $PostTagModel;
    private $TagModel;

    public function __construct()
    {
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

        for ($i = 0; $i <= $qtsTags; $i++) {
            $tagId = 'TAGS' . $i;

            if ($this->request->getPost($tagId) != null) {
                array_push($tags, $this->request->getPost($tagId));
            }
        }

        $img = $this->request->getFile('IMAGEM');
        $newName = $img->getRandomName();
        $url = "/imgs/uploads";
        $img->move(ROOTPATH . $url, $newName);


        $data = [
            'ID_CONTA' => $usuario->ID_CONTA,
            'TITULO' => $this->request->getPost('TITULO'),
            'DESCRICAO' => $this->request->getPost('DESCRICAO'),
            'VALOR' => $this->request->getPost('VALOR'),
            'DOACAO' => $this->request->getPost('DOACAO'),
            'CONTATO' => $this->request->getPost('CONTATO'),
            'CAMINHO_IMAGEM' => $newName,
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
            'Pesquisa' => $this->request->getPost('Pesquisa'),
            'Tags' => $this->request->getPost('Tags')
        ];

        $post = $this->PostModel->listarPesquisa($data);

        return view('lista(?)', [
            'post' => $post,
        ]);
    }

    public function like($idPost, $idConta)
    {
        $this->PostModel->like($idPost, $idConta);
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

        return view('visaoAdmin', [
            'post' => $post,
        ]);
    }

    public function aprovar()
    {
        $idPost = $this->request->getPost("ID_POST");
        $this->PostModel->aprovar($idPost);
        $this->response->redirect(base_url('PostController/listarAdminView'));
    }

    public function negarRedirecionar()
    {
        $idPost = $this->request->getPost("ID_POST");

        $data = [
            "idPost" => $idPost,
        ];

        return view("negando_post", $data);
    }

    public function negar()
    {
        $ID_CONTA = $this->request->getPost('ID_CONTA');
        $ID_POST = $this->request->getPost('ID_POST');
        $mensagem = $this->request->getPost('mensagem');

        $this->PostModel->negar($ID_CONTA, $ID_POST, $mensagem);
        $this->response->redirect(base_url('PostController/listarAdminView'));
    }
}