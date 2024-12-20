<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    public function index() : string
    {
        return view('landingpage', [
            'title' => "Welcome",
            'styles' => [
                "home.css"
                ]
        ]);
        
    }

    public function salahRole() :string{
        return view('salah');
    }
}
