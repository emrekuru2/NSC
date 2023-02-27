<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class AboutController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'About',
        ];

        return view('pages/about', $data);
    }
}
