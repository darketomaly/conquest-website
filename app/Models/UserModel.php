<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model {

    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'email', 'hash_pass'];

    //protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    //protected $validationRules    = ['username' => 'required|alpha_numeric',
    //                                'email' => 'required|valid_email|is_unique[user.email]'];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

    public function RegisterUser(array $data){

        $data['hash_pass'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if(!$this->save($data)){
            return false;
        }


        return true;
    }
}