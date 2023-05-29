<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DevelopmentTypesController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Development Types',
        ];

        return view('pages/admin/developmentTypes', $data);
    }
}
