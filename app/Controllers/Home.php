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
}
