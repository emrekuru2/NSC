<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use App\Models\UserTypes\ClubUserModel;
use Exception;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ClubsController extends BaseController
{
    protected $clubModel;
    protected $helpers = ['image', 'html', 'form', 'file'];

    public function __construct()
    {
        $this->clubModel = new ClubModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Clubs',
            'clubs'   => $this->clubModel->findAll(),
        ];

        return view('pages/admin/clubs', $data);
    }

    public function read(string $param)
    {
        $data = [
            'title'           => 'Clubs',
            'clubs'           => $this->clubModel->findAll(),
            'currentClub'     => $this->clubModel->select()->where('name', $param)->first(),
        ];

        return view('pages/admin/clubs', $data);
    }

    public function update()
    {

        $data = $this->request->getPost();
        $club = $this->clubModel->where('name', $data['name'])->first();

        // Delete the old image
        if (!isNull($club->image)) {
            unlink($club->image);
        }

        //Update the image
        $imageFile = $this->request->getFile('image');
        $filepath = storeImage('Clubs', $imageFile);
        $data['image'] = $filepath;


        if ($this->clubModel->update($club->id, $data)) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Club updated successfully!']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while updating club.']);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $imageFile = $this->request->getFile('image');
        $filepath = storeImage('Clubs', $imageFile);
        $data['image'] = $filepath;

        $club = new \App\Entities\Club();
        $club->fill($data);

        if (model(ClubModel::class)->save($club)) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Club created successfully!']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while creating club.']);
    }

    public function delete(int $param)
    {
        $currentClub = $this->clubModel->find($param);

        if(isEmpty($currentClub->getTeams()) || isEmpty($currentClub->getMembers())) {
            return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Teams and Members must be removed before deleting a club.']);
        }

        if ($this->clubModel->delete($param)) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Club deleted successfully!']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while deleting club.']);
    }

    public function removeMember()
    {
        $clubUserModel = model(ClubUserModel::class);
        $userModel     = model(UserEmailModel::class);

        $clubID   = esc($this->request->getPost('remove-member-club-id'));
        $fullName = esc($this->request->getPost('remove-member-name'));
        $fullName = explode('|', $fullName);

        $userID = $userModel->select()->where('first_name', $fullName[0])->where('last_name', $fullName[1])->first()->id;
        $clubUserModel->where('userID', $userID)->where('clubID', $clubID)->delete();

        if ($clubUserModel->where('userID', $userID)->where('clubID', $clubID)->first() === null) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Removed member successfully!']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while removing member. Please try again.']);
    }

    public function addMembers()
    {
        $clubID = $this->request->getPost('add-member-club-id');
        $json   = $this->request->getPost('add-members-JSON');

        if ($json !== '') {
            $usersJSON  = json_decode($json);
            $addSuccess = 0;
            $numMembers = count($usersJSON->members);

            foreach ($usersJSON->members as $member) {
                $data['userID'] = $member[0];
                $data['clubID'] = $clubID;

                if ($member[1] === 'manager') {
                    $data['isManager'] = 1;
                } else {
                    $data['isManager'] = 0;
                }

                $clubUser = new \App\Entities\UserTypes\ClubUser();
                $clubUser->fill($data);

                try {
                    model(ClubUserModel::class)->save($clubUser);
                    $addSuccess++;
                } catch (Exception $e) {
                    echo "<script> console.log('Error occurred while adding member to club. " . $e->getMessage() . ".') </script>";
                }
            }

            if ($numMembers > 0 && $addSuccess === $numMembers) {
                return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Members added successfully!']);
            }
            if ($addSuccess > 0) {
                return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Members added successfully! Error occurred while adding some members to club.']);
            }

            return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while adding members to club.']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error: No members selected.']);
    }

    public function removeTeam()
    {
        $teamModel = model(TeamModel::class);

        $teamName = esc($this->request->getPost('remove-team-name'));
        $teamID   = $teamModel->select()->where('name', $teamName)->first()->id;

        $teamModel->set('clubID', null)->where('id', $teamID)->update();

        if ($teamModel->where('id', $teamID)->first()->clubID === null) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Removed member successfully!']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while removing member. Please try again.']);
    }

    public function addTeams()
    {
        $teamModel = model(TeamModel::class);

        $clubID = $this->request->getPost('add-team-club-id');

        $json       = $this->request->getPost('add-teams-JSON');
        $addSuccess = 0;
        $numTeams   = -1;

        if ($json !== '') {
            $teamsJSON = json_decode($json);
            $numTeams  = count($teamsJSON->teams);

            foreach ($teamsJSON->teams as $teamName) {
                $teamID = $teamModel->select()->where('name', $teamName)->first()->id;

                try {
                    $teamModel->set('clubID', $clubID)->where('id', $teamID)->update();
                    $addSuccess++;
                } catch (Exception $e) {
                    echo "<script> console.log('Error occurred while adding team to club. " . $e->getMessage() . ".') </script>";
                }
            }
        }

        if ($addSuccess === $numTeams && $numTeams > 1) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Added teams successfully!']);
        }
        if ($addSuccess === $numTeams && $numTeams === 1) {
            return redirect()->back()->with('alert', ['type' => 'success', 'content' => 'Added team successfully!']);
        }

        return redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'Error occurred while adding teams.']);
    }
}
