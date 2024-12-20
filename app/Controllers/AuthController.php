<?php

namespace App\Controllers;
use App\Models\User;

use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function getLogin() : string{        
        return view('login', [
            'title' => "Login",
            'styles' => [
                'login.css'
            ]
        ]);
    }
    public function getRegister() : string {    
        return view('register', [
            'title' => "Register",
            'styles' => [
                'register.css'
                ]
        ]);
    }

    public function postLogin()
    {
        // Validate form inputs
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, return errors
            return view('login', ['errors' => $validation->getErrors()]);
        }

        // Collect form data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Load the UserModel to query user data
        $userModel = new User();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, set session data
            $session = session();
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);

            // Redirect to a dashboard or homepage

            if(session()->get('role') == 'admin' || session()->get('role') == 'doctor')
            {return redirect()->to('/dashboard')->with('message', 'Login successful!');}

            elseif(session()->get('role') == "apoteker")
            {return redirect()->to('/apoteker')->with('message', 'Login successful!');}

            elseif(session()->get('role') == "umum")
            {return redirect()->to('/book')->with('message', 'Login successful!');}
            
        } else {
            // Incorrect username or password
            return redirect()->back()->with('errors', ['login' => 'Invalid username or password']);
        }

        
    }

    public function logout()
    {
        // Destroy the session to log out the user
        $session = session();
        $session->destroy();

        return redirect()->to('/login')->with('message', 'You have been logged out.');
    }

    public function postRegister()
    {

        // Validate the form inputs
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[8]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, return errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());  
        }

        // Collect form data
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        $role     = 'umum';

        // Insert data into the database
        $userModel = new User();
        $userData = [
            'username' => $username,
            'password' => $password,
            'role'     => $role
        ];

        if ($userModel->insert($userData)) {
            // Registration successful
            return redirect()->to('login')->with('message', 'Registration successful!');
        } else {
            // Error handling
            return redirect()->back()->withInput()->with('errors', $userModel->errors());
        }

        return redirect()->to('login')->with('registered', 'you have registered successfully');    
    }



    
}
