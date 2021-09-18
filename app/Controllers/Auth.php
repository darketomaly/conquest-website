<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController {

    protected $session;

    public function __construct(){

        $this->session = service('session');
    }

    public function index() {

    }

    public function Login(){

        return view('auth/Login.php');
    }

    public function AttemptLogin(){

        var_dump($_POST);
    }

    public function Register(){
        return view('auth/register.php');
    }

    public function AttemptRegister(){

        var_dump($_POST);

        $user = model('UserModel');
        $profile = model('ProfileModel');

        $rules = [
            'username'          => 'required|alpha_numeric|min_length[3]',
            'email'             => 'required|valid_email|is_unique[user.email]',
            'password'          => 'required',
            'passwordConfirm'   => 'required|matches[password]'
        ];

        if(!$this->validate($rules))
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());

        $userInfo = $this->request->getPost(['username', 'password', 'email']);
        $profileInfo = $this->request->getPost(['sex', 'firstName', 'lastName', 'birth']);
        $profileInfo['name'] = $profileInfo['firstName'].' '.$profileInfo['lastName'];

        if(!$user->RegisterUser($userInfo))
            return redirect()->back()->withInput()->with('errors', $user->errors());

        $profileInfo['id'] = $user->getInsertID();

        if(!$profile->RegisterToProfile($profileInfo))
            return redirect()->back()->withInput()->with('errors', $profile->errors());

        return redirect()->to('/login')->with('message', 'Registro exitoso');
    }
}