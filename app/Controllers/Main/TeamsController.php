<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class TeamsController extends BaseController
{
    public function index()
    {
        $model = model(TeamModel::class);

        $data = [
            'teams' => $model->findAll(),
            'title' => 'Teams',
        ];

        return view('pages/main/teams', $data);
    }
    public function players($teamID)
    {
        $model = new TeamModel();
        $players = $model->getPlayersByTeamID($teamID);

        return $this->response->setJSON($players);
    }

}