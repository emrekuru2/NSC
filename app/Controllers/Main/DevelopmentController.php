<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Development',
        ];

        return view('pages/development', $data);
    }
}
