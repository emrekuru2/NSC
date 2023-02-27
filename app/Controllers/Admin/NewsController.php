<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class NewsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'News'
        ];
        
        
        return view('pages/admin/news', $data);
    }
}
