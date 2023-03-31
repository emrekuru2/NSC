<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use App\Models\UserTypes\ClubUserModel;
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
            'title'           => 'Clubs',
            'club'            => $club,
            'clubMembers'     => $club != null ? $userModel->getClubUsersByClubId($club->id) : null,
            'clubTeams'       => $club != null ? $teamModel->getTeamsInClub($club->id) : null,
            'allClubs'        => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll(),
            'unassignedTeams' => $club != null ? $teamModel->getUnassignedTeams() : null,
            'unassignedUsers' => $userModel->getUsersNotInTeam(),
            'allUsers'        => $userModel->select()->orderBy('nsca_users.last_name', 'ASC')->findAll()
        ];

        return view('pages/admin/clubs', $data);
    }

    public function updateClub()
    {}

    public function createClub()
    {
        helper('image');

        $data['name']         = esc($this->request->getPost('name'));
        $data['abbreviation'] = esc($this->request->getPost('abbreviation'));
        $data['description']  = esc($this->request->getPost('description'));
        $data['email']        = esc($this->request->getPost('email'));
        $data['phone']        = esc($this->request->getPost('phone'));
        $data['website']      = esc($this->request->getPost('website'));
        $data['facebook']     = esc($this->request->getPost('facebook'));

        // Logo
        $file     = $this->request->getFile('image');
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
    {
        $clubModel     = model(ClubModel::class);
        $clubUserModel = model(ClubUserModel::class);

        $clubID = $this->request->getPost('deleteClubID');

        $club = $clubModel->find($clubID);
        if (file_exists($club->image) && ! str_contains($club->image, 'default.png')) {
            unlink($club->image);
        }

        $clubModel->delete($clubID);
        $clubUserModel->deleteClubUsers($clubID);

        if ($clubModel->find($clubID) == null) {
            return redirect()->to('admin/clubs')->with('alert', ['type' => 'success', 'content' => 'Club deleted successfully']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while deleting club']);
    }

    public function removeMember()
    {
        $clubUserModel = model(ClubUserModel::class);
        $clubModel     = model(ClubModel::class);
        $userModel     = model(UserEmailModel::class);

        $clubID   = esc($this->request->getPost('remove-member-club-id'));
        $fullName = esc($this->request->getPost('remove-member-name'));

        $fullName = explode(',', $fullName);
        $userID   = $userModel->select()->where('first_name', $fullName[0])->where('last_name', $fullName[1])->first()->id;

        $clubUserModel->where('userID', $userID)->where('clubID', $clubID)->delete();
        $clubName = $clubModel->select()->find($clubID)->name;

        if ($clubUserModel->where('userID', $userID)->where('clubID', $clubID)->first() === null) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Removed member successfully']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while removing member']);
    }

    public function addMembers()
    {}

    public function removeTeam()
    {
        $clubModel = model(ClubModel::class);
        $teamModel = model(TeamModel::class);

        $teamName = esc($this->request->getPost('remove-team-name'));
        $teamID   = $teamModel->select()->where('name', $teamName)->first()->id;

        $teamModel->set('clubID', null)->where('id', $teamID)->update();

        if ($teamModel->where('id', $teamID)->first()->clubID === null) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Removed member successfully']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while removing member']);
    }

    public function addTeams()
    {}
}
