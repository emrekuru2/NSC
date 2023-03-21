<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use App\Models\UserTypes\TeamUserModel;
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

    public function editTeam()
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
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll(),
        ];

        return view('pages/admin/teams', $data);
    }

    public function getTeamToEdit(int $teamID)
    {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);
        $clubModel = model(ClubModel::class);

        $team = $teamModel->where('nsca_teams.id', $teamID)->findAll();

        $data = [
            'title' => 'Teams',
            'team' => count($team) > 0 ? $team[0] : null,
            'teamMembers' => count($team) > 0 ? $userModel->getTeamUsersByTeamId($team[0]->id) : null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll(),
        ];

        return view('pages/admin/teams', $data);
    }

    public function updateTeam()
    {
        helper('image');
        $teamModel = model(TeamModel::class);
        $clubModel = model(ClubModel::class);
        $userModel = model(UserEmailModel::class);
        $teamUserModel = model(TeamUserModel::class);

        $data['id'] = esc($this->request->getPost('update-team-id'));
        $data['clubID'] = esc($this->request->getPost('updateClubID'));
        $data['name'] = esc($this->request->getPost('updateTeamName'));
        $data['description'] = esc($this->request->getPost('updateTeamDescription'));

        $teamID = esc($this->request->getPost('update-team-id'));
        $team = $teamModel->find($teamID);

        // Deleting old image
        if (!str_contains($team->image, 'default.png')) {
            unlink('public/' . $team->image);
        }

        $image = $this->request->getFile('updateTeamImage');
        $filepath = storeImage('Teams', $image);
        if (!$filepath) {
            $data['image'] = 'assets/images/Teams/default.png';
        } else {
            $data['image'] = $filepath;
        }

        $team = new \App\Entities\Team();
        $team->fill($data);

        // Updating Team Members
        $json = $this->request->getPost('update-members-JSON');
        foreach ($json->players as $player) {
            $userID = $player[0];

            switch ($player[1]) {
                case 'player':
                    $teamUserModel->set('isViceCaptain', 0)
                        ->set('isTeamCaptain', 0)
                        ->where($userID);
                    break;
                case 'viceCaptain':
                    $teamUserModel->set('isViceCaptain', 1)
                        ->set('isTeamCaptain', 0)
                        ->where($userID);
                    break;
                case 'captain':
                    $teamUserModel->set('isViceCaptain', 0)
                        ->set('isTeamCaptain', 1)
                        ->where($userID);
                    break;
            }

            model(TeamModel::class)->save($team);
        }

        $data = [
            'title' => 'Teams',
            'teamMembers' => null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function createTeam()
    {
        $data['clubID'] = esc($this->request->getPost('newClubID'));
        $data['name'] = esc($this->request->getPost('newName'));
        $data['description'] = esc($this->request->getPost('newDescription'));

        // Logo
        helper('image');

        $file = $this->request->getFile('newImage');
        $filepath = storeImage('Teams', $file);
        if (!$filepath) {
            $data['image'] = 'assets/images/Teams/default.png';
        } else {
            $data['image'] = $filepath;
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

    public function deleteTeam()
    {
        $teamModel = model(TeamModel::class);

        $teamID = $this->request->getPost('deleteTeamID');

        $team = $teamModel->find($teamID);
        if (file_exists($team->image) && !str_contains($team->image, 'default.png')) {
            unlink($team->image);
        }

        $teamModel->delete($teamID);

        if (isEmpty($teamModel->find($teamID))) {
            $data = [
                'type'    => 'success',
                'content' => 'Team deleted successfully'
            ];

            return redirect()->to('admin/teams')->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'Error occurred while deleting team'
        ];

        return redirect()->to('admin/teams')->with('alert', $data);
    }

    public function removeMember()
    {
        $teamUserModel = model(TeamUserModel::class);

        $teamID = esc($this->request->getPost('remove-member-team-id'));
        $userID = esc($this->request->getPost('remove-member-id'));
        $teamUserModel->where('userID', $userID)->where('teamID', $teamID)->delete();

        return $this->getTeamToEdit($teamID);
    }

}