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
            $teamRow = $teamModel->select('id')->findAll()[0];
            $teamID = $teamRow->id;
        } else {
            $teamID = $this->request->getPost('teamID');
        }

        $team = $teamModel->where('nsca_teams.id', $teamID)->findAll();
        if (sizeof($team) == 0) {
            $team = null;
            $teamMembers = null;
        } else {
            $team = $team[0];
            $teamMembers = $userModel->getTeamUsersByTeamId($teamID);
        }

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
        $teamModel = model(TeamModel::class);

        $data = [
            'title' => 'Teams',
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function delete()
    {
        $teamModel = model(TeamModel::class);

        $data = [
            'title' => 'Teams',
            //'alert' =>
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

}