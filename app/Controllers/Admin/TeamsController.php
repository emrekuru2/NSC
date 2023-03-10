<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class TeamsController extends BaseController
{
    public function index()
    {
        $userModel = model(TeamModel::class);
        $teamModel = model(TeamModel::class);

        $data = [
            'title' => 'Teams',
            'teams' => $teamModel->findAll(),
            'users' => $userModel->findAll()
        ];
        
        
        return view('pages/admin/teams', $data);
    }

    public function edit()
    {

    }

}