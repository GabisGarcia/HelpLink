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

        public function Perfil()
    {
        return view('perfil');
    }
}
