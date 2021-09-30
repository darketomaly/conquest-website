<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Models\UserModel;

class MatchesDataModel extends Model {

    protected $table      = 'matches_data';
    protected $primaryKey = 'steamid';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['steamid', 'total_time', 'score', 'wins', 'loses', 'draws'];
    protected $skipValidation     = false;

    public function Register($_steamid){

        $m_fetch = $this->find($_steamid);

        if(!$m_fetch){

            $data['steamid'] = $_steamid;
            $this->insert($data);
        }
    }

    public function GetTopAccounts(){

        $this->select();
        $this->orderBy('score', 'desc');
        $this->limit(3);
        $query = $this->get();

        $_topaccountsarr[] = null;

        foreach ($query->getResult() as $row) {

            $userModel = new UserModel();
            $username = $userModel->GetUser($row->steamid);
            $_topaccountselement['username'] = $username ? $username: ($this->GetPlayerDataFromId($row->steamid))['personaname'];
            $_topaccountselement['score'] = $row->score;
            $_topaccountselement['profilePicture'] = ($this->GetPlayerDataFromId($row->steamid))['avatar'];
            array_push($_topaccountsarr, $_topaccountselement);
        }
        return $_topaccountsarr;
    }

    //Used by the hiscores. We need to retrieve display name data since we don't have access
    function GetPlayerDataFromId($steamid){

        //To do
        //Make a single api call with top player's ids instead

        $_apiKey = "A1BA08A219DA7727BEB6CFF70CB5C4CA";
        $content = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$_apiKey."&steamids=".$steamid);
        $content = json_decode($content, true);
        return $content['response']['players'][0];
    }
}