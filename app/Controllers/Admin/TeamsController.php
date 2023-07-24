<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;

use App\Models\UserTypes\TeamUserModel;

class TeamsController extends BaseController 
{
    protected $teamModel;
    protected $clubModel;
    protected $helpers = ['image', 'html', 'form', 'file'];

    public function __construct() 
    {
        $this->teamModel = model(TeamModel::class);
        $this->clubModel = model(ClubModel::class); 
    }

    public function index()
    { 
        $data = [
            'title'       => 'Teams',
            'teams'       => $this->teamModel->findAll(),
            'clubs'       => $this->clubModel->findAll()
        ];
        

        return view('pages/admin/teams', $data);
    }


    public function read(string $param)
    {
       
        $data = [
            'title'       => 'Teams',
            'teams'       => $this->teamModel->findAll(),
            'currentTeam' => $this->teamModel->where('name', $param)->first(),
            'clubs'       => $this->clubModel->findAll()
        ];

        return view('pages/admin/teams', $data);
    }

    public function updateTeam()
    {
        helper('image');
        $teamModel     = model(TeamModel::class);
        $teamUserModel = model(TeamUserModel::class);

        $clubID      = esc($this->request->getPost('updateClubID'));
        $name        = esc($this->request->getPost('updateTeamName'));
        $description = esc($this->request->getPost('updateTeamDescription'));
        $image       = $this->request->getFile('updateTeamImage');

        if ($clubID === 'none') {
            $clubID = null;
        }

        $teamID = esc($this->request->getPost('update-team-id'));
        $team   = $teamModel->find($teamID);

        if ($image->getSize() > 0) {
            // Deleting old image
            if (!str_contains($team->image, 'default.png')) {
                unlink($team->image);
            }

            $filepath = storeImage('Teams', $image);
            if (!$filepath) {
                $filepath = 'assets/images/Teams/default.png';
            }
        } else {
            $filepath = $team->image;
        }

        try {
            $teamModel->set('clubID', $clubID)
                ->set('name', $name)
                ->set('description', $description)
                ->set('image', $filepath)
                ->where('id', $teamID)
                ->update();
        } catch (Exception $e) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while updating team. Please try again.']);
        }

        // Updating Team Members
        $json = $this->request->getPost('update-members-JSON');
        if ($json !== '') {
            $teamJSON = json_decode($json);
            $updateSuccess = 0;
            $numPlayers = count($teamJSON->players);

            foreach ($teamJSON->players as $player) {
                $userID = $player[0];

                switch ($player[1]) {
                    case 'vice':
                        $isViceCaptain = 1;
                        $isTeamCaptain = 0;
                        break;

                    case 'captain':
                        $isViceCaptain = 0;
                        $isTeamCaptain = 1;
                        break;

                    default:
                        $isViceCaptain = 0;
                        $isTeamCaptain = 0;
                        break;
                }

                try {
                    $teamUserModel->set('isViceCaptain', $isViceCaptain)
                        ->set('isTeamCaptain', $isTeamCaptain)
                        ->where('userID', $userID)
                        ->where('teamID', $teamID)
                        ->update();
                    $updateSuccess++;
                } catch (Exception $e) {
                    echo "<script> console.log('Update failed when changing role for user: ' + '" . $userID . ', on team: ' . $teamID . " ') </script>";
                }
            }

            if ($numPlayers > 0 && $updateSuccess === $numPlayers) {
                return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Team updated successfully!']);
            }
            if ($updateSuccess > 0) {
                return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Team updated successfully! Error occurred while updating ' . ($numPlayers - $updateSuccess) . ' team members.']);
            }

            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Team updated successfully! Error while updating team members.']);
        }

        return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Team updated successfully!']);
    }

    public function createTeam()
    {
        $data['name']        = esc($this->request->getPost('newName'));
        $data['description'] = esc($this->request->getPost('newDescription'));

        if (esc($this->request->getPost('newClubID')) === 'none') {
            $data['clubID'] = null;
        } else {
            $data['clubID'] = esc($this->request->getPost('newClubID'));
        }

        // Logo
        helper('image');

        $file     = $this->request->getFile('newImage');
        $filepath = storeImage('Teams', $file);
        if (!$filepath) {
            $data['image'] = 'assets/images/Teams/default.png';
        } else {
            $data['image'] = $filepath;
        }

        $team = new \App\Entities\Team();
        $team->fill($data);

        try {
            if (model(TeamModel::class)->save($team)) {
                return redirect()->to('admin/teams?name=' . str_replace(' ', '+', $data['name']))->with('alert', ['type' => 'success', 'content' => 'Team created successfully!']);
            }
        } catch (Exception $e) {
            echo "<script> console.log('Error occurred while creating team. " . $e->getMessage() . " ') </script>";
        }

        return redirect()->to('admin/teams')->with('alert', ['type' => 'danger', 'content' => 'Error occurred while creating team. Please try again.']);
    }

    public function deleteTeam()
    {
        $teamModel     = model(TeamModel::class);
        $teamUserModel = model(TeamUserModel::class);

        $teamID = $this->request->getPost('deleteTeamID');

        $team = $teamModel->find($teamID);
        if (file_exists($team->image) && !str_contains($team->image, 'default.png')) {
            unlink($team->image);
        }

        $teamModel->delete($teamID);
        $teamUserModel->deleteTeamUsers($teamID);

        if ($teamModel->find($teamID) === null) {
            return redirect()->to('admin/teams')->with('alert', ['type' => 'success', 'content' => 'Team deleted successfully!']);
        }

        return redirect()->to('admin/teams')->with('alert', ['type' => 'danger', 'content' => 'Error occurred while deleting team. Please try again.']);
    }

    public function removeMember()
    {
        $teamUserModel = model(TeamUserModel::class);
        $teamModel     = model(TeamModel::class);

        $teamID = esc($this->request->getPost('remove-member-team-id'));
        $userID = esc($this->request->getPost('remove-member-id'));
        $teamUserModel->where('userID', $userID)->where('teamID', $teamID)->delete();

        $teamName = $teamModel->select('name')->find($teamID)->name;

        try {
            if ($teamUserModel->where('userID', $userID)->where('teamID', $teamID)->first() === null) {
                return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Removed member successfully!']);
            }
        } catch (Exception $e) {
            echo "<script> console.log('Error occurred while removing team member. " . $e->getMessage() . " ') </script>";
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while removing member. Please try again.']);
    }

    public function addMembers()
    {
        $teamID = $this->request->getPost('add-member-team-id');
        $json   = $this->request->getPost('add-members-JSON');

        if ($json !== '') {
            $usersJSON  = json_decode($json);
            $addSuccess = 0;
            $numMembers = count($usersJSON->members);

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
                    model(TeamUserModel::class)->save($teamUser);
                    $addSuccess++;
                } catch (Exception $e) {
                    echo "<script> console.log('Error occurred while adding member to team. " . $e->getMessage() . ".') </script>";
                }
            }

            if ($numMembers > 0 && $addSuccess == $numMembers) {
                return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Members added successfully!']);
            }
            if ($addSuccess > 0) {
                return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Members added successfully! Error occurred while adding some members to team.']);
            }

            return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while adding members to team.']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error: No members selected.']);
    }
}
