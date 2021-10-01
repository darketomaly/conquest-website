<?php

namespace App\Controllers;

class Profile extends BaseController {

    public function index() {

        $data['title'] = "Profile";
        require APPPATH.'ThirdParty\steamauth\steamauth.php';

        if(isset($_SESSION['steamid'])){

            $auth = new Auth();
            $auth->CheckSteamDataOnDatabase();
        }

        return view('profile_view', $data);
    }
}
