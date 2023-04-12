<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UsuarioModel extends Model
    {
        protected $table = 'USUARIO';
        protected $primaryKey = 'ID_CONTA';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['EMAIL', 'SENHA', 'TELEFONE', 'DESCRICAO_USER'];
        protected $returnType = 'object';
    }