<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\ClubJoinlistModel;
use App\Models\ClubModel;
use App\Models\TeamModel;
class ClubsController extends BaseController
{
    public function index()
    {
        $model = model(ClubModel::class);
        $teamModel = model(TeamModel::class);
        
        $data = [
            'clubs' => $model->findAll(),
            'teams' => $teamModel->findAll(), 
            'title' => 'Clubs',
        ];

        return view('pages/clubs', $data);
    }

    public function getClubTeams (int $clubID) {
        $model = model(ClubModel::class);
        $teamModel = model(TeamModel::class);

        $data = [
            'clubs' => $model->findAll(),
            'teams' => $teamModel->findAll(), 
            'title' => 'Clubs',
        ];
    }
}
