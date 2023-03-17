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
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'teamMembers' => null
        ];

        return view('pages/admin/teams', $data);
    }

    public function editTeam()
    {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);
        $clubModel = model(ClubModel::class);

        if ($this->request->getPost('teamName') != null) {
            $teamRow = $teamModel->select('id')->findAll()[0];
            $teamID = $teamRow->id;
        } else {
            $teamID = $this->request->getPost('teamID');
        }

        $team = $teamModel->where('nsca_teams.id', $teamID)->findAll();

        $data = [
            'title' => 'Teams',
            'team' => sizeof($team) > 0 ? $team[0] : null,
            'teamMembers' => sizeof($team) > 0 ? $userModel->getTeamUsersByTeamId($teamID) : null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function updateTeam()
    {
        $teamModel = model(TeamModel::class);

        $data = [
            'title' => 'Teams',
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function deleteTeam()
    {
        $teamModel = model(TeamModel::class);

        $data = [
            'title' => 'Teams',
            //'alert' =>
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function removeMember()
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