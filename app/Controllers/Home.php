<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome');
    }

    public function Cadastro()
    {
        return view('cadastro');
    }


    public function Login()
    {
        return view('login');
    }    
    
    public function Perfil()
    {
        return view('perfil');
    }
        
    public function formularioPost()
    {
        return view('formularioPub');
    }

    public function Config_perfil()
    {
        return view('config_perfil');
    }

    public function edicaoPerfil()
    {
        return view('edicao_perfil');
    }

    public function edicaoSenha()
    {
        return view('edicao_senha');
    }

    public function alterarSenha()
    {
        return view('alterar_senha');
    }
    
    public function visaoADM()
    {
        return view('visaoAdmin');
    }

    public function apagarperfil()
    {
        return view('apagarperfil');
    }

    public function EULA()
    {
        return view('EULA');
    }

}
