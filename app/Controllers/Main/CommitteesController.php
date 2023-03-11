<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class CommitteesController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Committees',
        ];

        return view('pages/committees', $data);
    }
}
