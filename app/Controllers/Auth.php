<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ProfileModel;

class Auth extends BaseController {

    protected $session;

    public function __construct(){

        //if(session_status() !== PHP_SESSION_ACTIVE)
        //    $this->session = service('session');
    }

    public function index() {

    }

    public function Login(){

        if($this->logged_in())
            return redirect()->to('/Home');

        return view('auth/Login.php');
    }

    public function AttemptLogin(){

        //session_destroy();
        //$this->session->destroy();
        if($this->logged_in())
            return redirect()->to('/Home');

        //$this->session->destroy();

        //var_dump($_POST);
        $loginCredentials = $this->request->getPost(['email', 'password']);
        $user = new UserModel();

        $query = $user->where('email', $loginCredentials['email'])->find();
        if(empty($query))
            return redirect()->back()->withInput()->with('message', 'El correo no existe');

        $userData = $query[0];
        //var_dump($query);

        if(!password_verify($loginCredentials['password'], $userData['hash_pass']))
            return redirect()->back()->withInput()->with('message', 'Las credenciales no coinciden con el correo');

        //session_start();
        //$this->session = $this->session();

        $array = [
            'username' => $userData['username'],
            'email' => $userData['email'],
            'logged_in' => true
        ];

        $this->session->set($array);
        return redirect()->to('/');

        //$_SESSION['user'] = $userData['id'];
        //$this->session->user = $userData['id'];
        //$this->session->remove('user');
    }

    public function logged_in(){

        if($this->session->get('logged_in'))
            return true;

        return false;
    }

    public function Register(){

        if($this->logged_in())
            return redirect()->to('/Home');

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

    public function GetUserData(){

        if($this->logged_in()){

            $user = new UserModel();
            $query = $user->where('email', $this->session->get('email'))->find();
            $_id = $query[0]['id'];

            $profile = new ProfileModel();
            $data = $profile->find($_id);
            return $data;
        }

        return null;
    }

    public function log_out(){

        //$this->session->destroy();
        session_start();
        unset($_SESSION['steamid']);
        unset($_SESSION['steam_uptodate']);
        return redirect()->to('/Home');
    }

    //Attempts to register user
    //Sets the display name session variable
    //If no display name is set on database it defaults to steam's display name
    public function CheckSteamDataOnDatabase(){

        $user = model('UserModel');
        include APPPATH.'ThirdParty\steamauth\userInfo.php';

        $m_tmp = $user->GetUser($steamprofile['steamid']);
        $_SESSION['display_name'] = $m_tmp ? $m_tmp : $steamprofile['personaname'];
        $_SESSION['using_steam_display_name'] = !$m_tmp;
    }

    public function UpdateDisplayName(){

        $user = model('UserModel');

        session_start(); //wasn't loading session data for some reason?
        if($user->UpdateDisplayName($_POST)){

            $_SESSION['m_message'] = "Saved your data";
            return redirect()->to('../profile');

        } else {

        }
    }
}