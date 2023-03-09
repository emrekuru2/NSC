<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

use App\Models\ClubModel;

class ClubsController extends BaseController
{
    public function index()
    {
        $model = model(ClubModel::class);

        $data = [
            'clubs'  => $model->findAll(),
            'title' => 'Clubs',
        ];

        return view('pages/clubs', $data);
    }
}
