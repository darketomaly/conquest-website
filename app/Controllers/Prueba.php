<?php

namespace App\Controllers;

class Prueba extends BaseController {

    public function index(){

        return view('welcome_message');
    }

    public function prueba($text =  "Hola mundo", $text2 = "Hello world"){

        var_dump($text);
        //var_dump($_POST);
    }
}
