<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Settings'
        ];
        
        
        return view('pages/admin/settings', $data);
    }
}