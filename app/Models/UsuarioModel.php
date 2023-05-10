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

    public function verificaUsuario($data)
    {
        var_dump($data);
        $email = $this->db->query('SELECT * FROM USUARIO WHERE EMAIL = ' . $data['EMAIL'] . ';');

        //var_dump($email);

    }
}
