<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use App\Controllers\Auth;

class Home extends BaseController {

    public function index() {

        $auth = new Auth();

        if(!is_null($data = $auth->GetUserData())){

            $data['auth'] = true;
            //return view('welcome_message', );
        }

        $data['title'] = "__Home";

        return view('welcome_message', $data);
    }
}
