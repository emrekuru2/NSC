<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AlertsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Announcements'
        ];
        
        
        return view('pages/admin/announcements', $data);
    }
}
