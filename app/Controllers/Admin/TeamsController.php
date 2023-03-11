<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TeamsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Teams'
        ];
        
        
        return view('pages/admin/teams', $data);
    }
}