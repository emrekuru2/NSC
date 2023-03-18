<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use function PHPUnit\Framework\isEmpty;

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
            'team' => count($team) > 0 ? $team[0] : null,
            'teamMembers' => count($team) > 0 ? $userModel->getTeamUsersByTeamId($teamID) : null,
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
        $data['clubID'] = esc($this->request->getPost('newClubID'));
        $data['name'] = esc($this->request->getPost('newName'));
        $data['description'] = esc($this->request->getPost('newDescription'));

        // Logo
        //helper('image');
        $file = $this->request->getFile('newImage');
        if ($file != null) {
            $filepath = storeImage('Teams', $file);
            if ($filepath != null) {
                $data['image'] = $filepath;
            } else {
                $data['image'] = 'assets/images/Teams/default.png';
            }
        } else {
            $data['image'] = 'assets/images/Teams/default.png';
        }

        $team = new \App\Entities\Team();
        $team->fill($data);

        if (model(TeamModel::class)->save($team)) {
            $data = [
                'type'    => 'success',
                'content' => 'Team created successfully'
            ];

            return redirect()->to('admin/teams')->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'Error occurred while creating team'
        ];

        return redirect()->to('admin/teams')->with('alert', $data);
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