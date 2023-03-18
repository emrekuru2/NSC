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
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            'teamMembers' => null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function edit()
    {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);
        $clubModel = model(ClubModel::class);

        if ($this->request->getPost('search') != null) {
            $teamName = $this->request->getPost('search');
            $teamRow = $teamModel->select('nsca_teams.id')->where('nsca_teams.name', $teamName)->findAll();
            sizeof($teamRow) > 0 ? $teamID = $teamRow[0]->id : $teamID = -1;
        } else {
            $teamID = $this->request->getPost('groupID');
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

    public function update()
    {
        $teamModel = model(TeamModel::class);
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            'teamMembers' => null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function create()
    {
        $teamModel = model(TeamModel::class);
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            //'alert' =>
            'teamMembers' => null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function delete()
    {
        $teamModel = model(TeamModel::class);
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            //'alert' =>
            'teamMembers' => null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function updateMember()
    {
        $teamModel = model(TeamModel::class);
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            //'alert' =>
            'teamMembers' => null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function removeMember()
    {
        $teamModel = model(TeamModel::class);
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            //'alert' =>
            'teamMembers' => null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

}