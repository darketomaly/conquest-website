<?php

namespace App\Models;
use CodeIgniter\Model;
class GalleryModel extends Model {

    protected $table            = 'gallery';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields;
    protected $skipValidation   = false;

    public function GetGalleryImages(){

        return $this->findAll();
    }

    public function GetGalleryImage($id){

        return $this->find($id);
    }
}