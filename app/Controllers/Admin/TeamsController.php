<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use App\Models\UserTypes\TeamUserModel;
use Exception;
use function PHPUnit\Framework\isEmpty;

class TeamsController extends BaseController
{
    public function index()
    {
        $teamModel = model(TeamModel::class);
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Teams',
            'team' => null,
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
            $teamName = esc($this->request->getPost('search'));
            $team = $teamModel->select()->where('name', $teamName)->first();
        } else {
            $teamID = $this->request->getPost('groupID');
            $team = $teamModel->select()->find($teamID);
        }

        $data = [
            'title' => 'Teams',
            'team' => $team,
            'teamMembers' => $team != null ? $userModel->getTeamUsersByTeamId($team->id) : null,
            'allTeams' => $teamModel->select()->orderBy('name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('name', 'ASC')->findAll(),
            'allUsers' => $userModel->select()->orderBy('last_name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function getTeamToEdit(int $teamID)
    {
        $teamModel = model(TeamModel::class);
        $userModel = model(UserEmailModel::class);
        $clubModel = model(ClubModel::class);
        $userEmailModel = model(UserEmailModel::class);

        $team = $teamModel->where('nsca_teams.id', $teamID)->findAll();

        $data = [
            'title' => 'Teams',
            'team' => count($team) > 0 ? $team[0] : null,
            'teamMembers' => count($team) > 0 ? $userModel->getTeamUsersByTeamId($team[0]->id) : null,
            'allTeams' => $teamModel->select()->orderBy('nsca_teams.name', 'ASC')->findAll(),
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll(),
            'allUsers' => $userEmailModel->select()->orderBy('nsca_users.last_name', 'ASC')->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function searchTeam()
    {
        $teamModel = model(TeamModel::class);

        $teamName = esc($this->request->getVar('search'));
        $team = $teamModel->select()->where('name', $teamName)->first();

        return $this->getTeamToEdit($team->id);
    }

    public function updateTeam()
    {
        helper('image');
        $teamModel = model(TeamModel::class);
        $teamUserModel = model(TeamUserModel::class);

        $clubID = esc($this->request->getPost('updateClubID'));
        $name = esc($this->request->getPost('updateTeamName'));
        $description = esc($this->request->getPost('updateTeamDescription'));
        $image = $this->request->getFile('updateTeamImage');

        $teamID = esc($this->request->getPost('update-team-id'));
        $team = $teamModel->find($teamID);

        // New Team Image
        if ($image->isValid()) {
            // Deleting old image
            if (!str_contains($team->image, 'default.png')) {
                unlink($team->image);
            }

            $filepath = storeImage('Teams', $image);
            if (!$filepath) {
                $filepath = 'assets/images/Teams/default.png';
            }

            try {
                $teamModel->set('clubID', $clubID)
                    ->set('name', $name)
                    ->set('description', $description)
                    ->set('image', $filepath)
                    ->where('id', $teamID)
                    ->update();
            } catch (Exception $e) {
                echo "<script> console.log('Update failed for team: " . $teamID . " ') </script>";
            }
        }

        // No New Team Image
        else {
            try {
                $teamModel->set('clubID', $clubID)
                    ->set('name', $name)
                    ->set('description', $description)
                    ->where('id', $teamID)
                    ->update();
            } catch (Exception $e) {
                echo "<script> console.log('Update failed for team: " . $teamID . " ') </script>";
            }

        }

        // Updating Team Members
        $json = $this->request->getPost('update-members-JSON');
        if ($json != '') {
            $teamJSON = json_decode($json);

            foreach ($teamJSON->players as $player) {
                $userID = $player[0];

                switch ($player[1]) {
                    case 'vice':
                        try {
                            $teamUserModel->set('isViceCaptain', 1)
                                ->set('isTeamCaptain', 0)
                                ->where('userID', $userID)
                                ->where('teamID', $teamID)
                                ->update();
                        } catch (Exception $e) {
                            echo "<script> console.log('Update failed when changing role to \'Player\' for user: ' + '" . $userID . ", on team: " . $teamID . " ') </script>";
                        }
                        break;

                    case 'captain':
                        try {
                            $teamUserModel->set('isViceCaptain', 0)
                                ->set('isTeamCaptain', 1)
                                ->where('userID', $userID)
                                ->where('teamID', $teamID)
                                ->update();
                        } catch (Exception $e) {
                            echo "<script> console.log('Update failed when changing role to \'Captain\' for user: ' + '" . $userID . ", on team: " . $teamID . " ') </script>";
                        }
                        break;
                    default:
                        try {
                            $teamUserModel->set('isViceCaptain', 0)
                                ->set('isTeamCaptain', 0)
                                ->where('userID', $userID)
                                ->where('teamID', $teamID)
                                ->update();
                        } catch (Exception $e) {
                            echo "<script> console.log('Update failed when changing role to \'Vice-Captain\' for user: ' + '" . $userID . ", on team: " . $teamID . " ') </script>";
                        }
                        break;
                }
            }
        }

        return $this->getTeamToEdit($teamID);
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
        $teamUserModel = model(TeamUserModel::class);

        $teamID = $this->request->getPost('deleteTeamID');

        $team = $teamModel->find($teamID);
        if (file_exists($team->image) && !str_contains($team->image, 'default.png')) {
            unlink($team->image);
        }

        $teamModel->delete($teamID);
        $teamUserModel->deleteTeamUsers($teamID);

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

    public function addMembers()
    {
        $teamUserModel = model(TeamUserModel::class);

        $teamID = $this->request->getPost('add-member-team-id');

        $json = $this->request->getPost('add-members-JSON');
        if ($json != '') {
            $usersJSON = json_decode($json);

            foreach ($usersJSON->members as $member) {

                $data['userID'] = $member[0];
                $data['teamID'] = $teamID;

                switch ($member[1]) {
                    case 'vice':
                        $data['isTeamCaptain'] = 0;
                        $data['isViceCaptain'] = 1;
                        break;

                    case 'captain':
                        $data['isTeamCaptain'] = 1;
                        $data['isViceCaptain'] = 0;
                        break;
                    default:
                        $data['isTeamCaptain'] = 0;
                        $data['isViceCaptain'] = 0;
                        break;
                }

                $teamUser = new \App\Entities\UserTypes\TeamUser();
                $teamUser->fill($data);

                try {
                    $teamUserModel->save($teamUser);
                } catch (Exception $e) {
                    echo "<script> console.log('Failed to assign user to team.') </script>";
                }
            }
        }

        return $this->getTeamToEdit($teamID);
    }

}