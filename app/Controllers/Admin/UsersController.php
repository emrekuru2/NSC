<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Users'
        ];
        
        
        return view('pages/admin/users', $data);
    }
}