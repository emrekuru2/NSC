<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class TeamsController extends BaseController
{
    public function index()
    {
        $model = model(TeamModel::class);

        $data = [
            'teams' => $model->findAll(),
            'title' => 'Teams',
        ];

        return view('pages/teams', $data);
    }
}
