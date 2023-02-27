<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Development'
        ];
        
        
        return view('pages/admin/development', $data);
    }
}