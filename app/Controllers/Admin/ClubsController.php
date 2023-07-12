<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\UserTypes\ClubUser;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserTypes\ClubUserModel;

class ClubsController extends BaseController
{
    protected $helpers = ['image', 'html', 'form', 'file'];
    protected $clubUserModel;
    protected $clubModel;
    protected $teamModel;
    protected $totalClubs;

    public function __construct()
    {
        $this->clubModel     = new ClubModel();
        $this->teamModel     = new TeamModel();
        $this->clubUserModel = new ClubUserModel();
        $this->totalClubs    = $this->clubModel->findAll();
    }

    public function index()
    {
        $data = [
            'title'   => 'Clubs',
            'clubs'   => $this->totalClubs
        ];

        return view('pages/admin/clubs', $data);
    }

    public function read(string $param)
    {
        $data = [
            'title'           => 'Clubs',
            'clubs'           => $this->totalClubs,
            'currentClub'     => $this->clubModel->where('name', $param)->first(),
        ];

        return view('pages/admin/clubs', $data);
    }

    public function update()
    {

        $data = $this->request->getPost();
        $club = $this->clubModel->where('name', $data['name'])->first();

        //Update the image
        $imageFile = $this->request->getFile('image');
        $filepath = storeImage('Clubs', $imageFile);
        $data['image'] = $filepath;

        return ($this->clubModel->update($club->id, $data))
            ? toast('success', lang('Admin.club.update.success'))
            : toast('danger',  lang('Admin.club.update.error'));
    }

    public function create()
    {
        $data = $this->request->getPost();
        $imageFile = $this->request->getFile('image');
        $filepath = storeImage('Clubs', $imageFile);
        $data['image'] = $filepath;

        $club = new \App\Entities\Club();
        $club->fill($data);

        return ($this->clubModel->save($club))
            ? toast('success', lang('Admin.club.create.succes'))
            : toast('danger',  lang('Admin.club.create.error'));
    }

    public function delete(int $param)
    {
        $currentClub = $this->clubModel->find($param);

        if (!empty($currentClub->getTeams()) || !empty($currentClub->getMembers())) {
            return toast('danger', lang('Admin.club.foreignKey'));
        }

        return ($this->clubModel->delete($param))
            ? toast('success', lang('Admin.club.update.success'))
            : toast('danger',  lang('Admin.club.update.error'));
    }

    public function removeMember(int $param)
    {
        return ($this->clubUserModel->delete($param))
            ? toast('success', lang('Admin.club.removeMember.success'))
            : toast('danger',  lang('Admin.club.removeMember.error'));
    }

    public function addMember()
    {
        $clubID = $this->request->getPost('clubID');
        $userIDs = $this->request->getPost('userID');

        if (empty($userIDs)) {
            return toast('danger', lang('Admin.club.requiredUsers'));
        }

        $memberEntities = array_map(function ($userID) use ($clubID) {
            $member = new ClubUser();
            $member->userID = $userID;
            $member->clubID = $clubID;
            return $member;
        }, $userIDs);

        return ($this->clubUserModel->insertBatch($memberEntities))
            ? toast('success', lang('Admin.club.addMember.success'))
            : toast('danger',  lang('Admin.club.addMember.error'));
    }

    public function addManager(int $id)
    {
        return ($this->clubUserModel->update($id, ['isManager' => 1]))
            ? toast('success', lang('Admin.club.addManager.success'))
            : toast('danger',  lang('Admin.club.addManager.error'));
    }

    public function removeManager(int $id)
    {
        return ($this->clubUserModel->update($id, ['isManager' => 0]))
            ? toast('success', lang('Admin.club.removeManager.success'))
            : toast('danger',  lang('Admin.club.removeManager.error'));
    }

    public function removeTeam(int $param)
    {
        return ($this->teamModel->update($param, ['clubID' => NULL]))
            ? toast('success', lang('Admin.club.removeTeam.success'))
            : toast('danger',  lang('Admin.club.removeTeam.error'));
    }

    public function addTeam()
    {
        $clubID  = $this->request->getPost('clubID');
        $teamIDs = $this->request->getPost('teamID');
        $successCount = 0;

        if (empty($teamIDs)) {
            return toast('danger', lang('Admin.club.requiredTeams'));
        }

        foreach ($teamIDs as $teamID) {
            if ($this->teamModel->update($teamID, ['clubID' => $clubID])) {
                $successCount++;
            };
        }

        return (sizeof($teamIDs) === $successCount)
            ? toast('success', lang('Admin.club.addTeam.success'))
            : toast('danger',  lang('Admin.club.addTeam.error'));
    }
}
