<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ClubsController extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Clubs',
        ];

        return view('pages/admin/clubs', $data);
    }
}
