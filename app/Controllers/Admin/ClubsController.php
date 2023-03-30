<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use App\Controllers\BaseController;

class ClubsController extends BaseController
{
    public function index()
    {
        $clubModel = model(ClubModel::class);
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);

        if ($this->request->getVar('search') !== null) {
            $clubName = $this->request->getVar('search');
            $club     = $clubModel->select()->where('name', $clubName)->first();
        } elseif ($this->request->getVar('name') !== null) {
            $clubName = $this->request->getVar('name');
            $club     = $clubModel->select()->where('name', $clubName)->first();
        } else {
            $club = null;
        }

        $data = [
            'title' => 'Clubs',
            'club' => $club,
            'clubMembers' => $club != null ? $userModel->getClubUsersByClubId($club->id) : null,
            'clubTeams' => $club != null ? $teamModel->getTeamsInClub($club->id) : null,
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll(),
            'unassignedTeams' => $club != null ? $teamModel->getUnassignedTeams() : null,
            'allUsers' => $userModel->select()->orderBy('nsca_users.last_name', 'ASC')->findAll()
        ];

        return view('pages/admin/clubs', $data);
    }

    public function updateClub()
    {
        $clubModel = model(ClubModel::class);

        $data = [
            'title'    => 'Clubs',
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll(),
        ];

        return view('pages/admin/clubs', $data);
    }

    public function createClub()
    {}

    public function deleteClub()
    {}

    public function removeMember()
    {}

    public function addMembers()
    {}

    public function addTeams()
    {}
}
