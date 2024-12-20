<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        
        if ($arguments && !in_array(session()->get('role'), $arguments)) {
            return redirect()->to('/salah'); 
        }
    }
    

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No after logic needed
    }
}
