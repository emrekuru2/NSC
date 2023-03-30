<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use Exception;

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
    {
        helper('image');

        $data['name'] = esc($this->request->getPost('name'));
        $data['abbreviation'] = esc($this->request->getPost('abbreviation'));
        $data['description'] = esc($this->request->getPost('description'));
        $data['email'] = esc($this->request->getPost('email'));
        $data['phone'] = esc($this->request->getPost('phone'));
        $data['website'] = esc($this->request->getPost('website'));
        $data['facebook'] = esc($this->request->getPost('facebook'));

        // Logo
        $file = $this->request->getFile('image');
        $filepath = storeImage('Clubs', $file);
        if (! $filepath) {
            $data['image'] = 'assets/images/Clubs/default.png';
        } else {
            $data['image'] = $filepath;
        }

        $club = new \App\Entities\Club();
        $club->fill($data);

        try {
            if (model(ClubModel::class)->save($club)) {
                return redirect()->to('admin/clubs?name=' . str_replace(' ', '+', $data['name']))->with('alert', ['type' => 'success', 'content' => 'Team created successfully']);
            }
        } catch (Exception $e) {
            echo "<script> console.log('Error occurred while creating club. " . $e->getMessage() . ".') </script>";
        }

        return redirect()->to('admin/clubs')->with('alert', ['type' => 'danger', 'content' => 'Error occurred while creating team']);
    }

    public function deleteClub()
    {}

    public function removeMember()
    {}

    public function addMembers()
    {}

    public function addTeams()
    {}
}
