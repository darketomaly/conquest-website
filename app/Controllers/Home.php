<?php

namespace App\Controllers;
use App\Controllers\Auth;
use App\Models\MatchesDataModel;

class Home extends BaseController {

    public function index() {

        $data['title'] = "Conquest Remastered";
        require APPPATH.'ThirdParty\steamauth\steamauth.php';

        if(isset($_SESSION['steamid'])){

            $auth = new Auth();
            $auth->CheckSteamDataOnDatabase();
        }

        $matchesData = new MatchesDataModel();
        $data['topaccounts'] = $matchesData->GetTopAccounts();

        return view('welcome_message', $data);
    }
}
