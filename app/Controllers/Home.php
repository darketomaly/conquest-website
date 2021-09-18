<?php

namespace App\Controllers;
use App\Models\ProfileModel;

class Home extends BaseController {

    public function index() {

        $profile = new ProfileModel();
        $data = $profile->find(18);

        return view('welcome_message', $data);
    }
}
