<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        
        
        return view('pages/admin/dashboard', $data);
    }
}
