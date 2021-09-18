<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model {

    protected $table      = 'profile';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'name', 'birth', 'profile_pic', 'sex'];

    //protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    //protected $validationRules    = ['username' => 'required|alphanumeric'];
    //protected $validationMessages = ['username' => ['required'=>'Este cambio es obligatorio']];
    protected $skipValidation     = false;

    public function RegisterToProfile(array $data){

        if($this->find($data['id'])){

            if(!$this->save($data))
                return false;

        } else {

             if(!$this->insert($data))
                 return false;
         }


        return true;
    }
}