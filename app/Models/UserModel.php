<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Models\MatchesDataModel;

class UserModel extends Model {

    protected $table      = 'user';
    protected $primaryKey = 'steamid';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['steamid', 'display_name'];
    protected $skipValidation     = false;

    //Register and/or fetch
    public function GetUser($_steamid){

        $m_fetch = $this->find($_steamid);

        if(!$m_fetch){ //register

            $data['steamid'] = $_steamid;
            $this->insert($data);

            $matchesData = new MatchesDataModel();
            $matchesData->Register($_steamid);

            return null;

        } else return $m_fetch['display_name'];
    }
}