<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserModel;
use App\Models\UserTypes\TeamUserModel;

class TeamsController extends BaseController
{
    public function index()
    {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserModel::class);
        $teamUserModel = model(TeamUserModel::class);
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            'teams' => $teamModel->findAll(),
            'users' => $userModel->findAll(),
            'teamUsers' => $teamUserModel->findAll(),
            'clubs' => $clubModel->findAll()
        ];
        
        
        return view('pages/admin/teams', $data);
    }

    public function edit()
    {

    }

}