<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AlertsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Alerts'
        ];
        
        
        return view('pages/admin/alerts', $data);
    }
}
