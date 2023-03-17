<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;

class TeamsController extends BaseController
{
    public function index()
    {
        $teamModel = model(TeamModel::class);

        $data = [
            'title' => 'Teams',
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function edit()
    {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);
        $clubModel = model(ClubModel::class);

        if ($this->request->getPost('teamName') !== null) {
            $teamRow = $teamModel->select('id')->findAll(1);
            $teamID = $teamRow[0]->id;
        } else {
            $teamID = $this->request->getPost('teamID');
        }
        $team = $teamModel->find($teamID);
        $teamMembers = $userModel->getTeamUsersByTeamId($teamID);

        $data = [
            'title' => 'Teams',
            'team' => $team,
            'teamMembers' => $teamMembers,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function update()
    {
        $data = [];

        return view('pages/admin/teams', $data);
    }

    public function remove()
    {
        $data = [];

        return view('pages/admin/teams', $data);
    }

}