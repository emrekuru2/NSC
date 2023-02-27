<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CompetitionsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Competitions'
        ];
        
        
        return view('pages/admin/competitions', $data);
    }
}