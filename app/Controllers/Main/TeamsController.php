<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class TeamsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Teams',
        ];

        return view('pages/teams', $data);
    }
}
