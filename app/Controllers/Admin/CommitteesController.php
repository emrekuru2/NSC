<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CommitteesController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Committees'
        ];
        
        
        return view('pages/admin/committees', $data);
    }
}