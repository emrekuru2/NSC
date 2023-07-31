<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Interfaces\CRUD;
use App\Entities\UserTypes\CommitteeUser;
use App\Models\CommitteeModel;
use App\Entities\Committee;
use App\Models\UserModel;
use App\Models\UserTypes\CommitteeUserModel;

class CommitteesController extends BaseController implements CRUD
{
    protected $helpers = ['image', 'html', 'form', 'file'];
    protected $committeeUserModel;
    protected $committeeModel;
    protected $totalCommittees;

    public function __construct()
    {
        $this->committeeModel     = new committeeModel();
        $this->committeeUserModel = new CommitteeUserModel();
        $this->totalCommittees    = $this->committeeModel->findAll();
    }

    public function index()
    {
        $data = [
            'title'   => 'committee',
            'committees'   => $this->totalCommittees
        ];

        return view('pages/admin/committees', $data);
    }

    public function read(string $param)
    {
        if (is_string($param)) {
            $currentCommittee = $this->committeeModel->where('name', $param)->first();
        } else {
            $currentCommittee = $this->committeeModel->find($param);
        }

        $data = [
            'title'           => 'Committees',
            'committees'           => $this->totalCommittees,
            'currentCommittee'     => $currentCommittee,
        ];

        return view('pages/admin/committees', $data);
    }

    public function update(int $param)
    {
        $data = $this->request->getPost();

        //Update the image
        $imageFile = $this->request->getFile('image');
        $filepath = storeImage('Committee', $imageFile);
        $data['image'] = $filepath;

        $data['start_date'] = $data['startyear'];

        if (empty($data['endyear'])) {
            $data['end_date'] = null; // Set end_date to null if endyear is empty
            $data['present'] = true;  // Set the 'present' checkbox to checked
        } else {
            $data['end_date'] = $data['endyear'];
            unset($data['present']); // Unset the 'present' field as it's not needed when there's an end_date
        }

        return ($this->committeeModel->update($param, $data))
            ? toast('success', lang('Admin.committee.update.success'))
            : toast('danger',  lang('Admin.committee.update.error'));
    }

    public function create()
    {
        $data = $this->request->getPost();
        $imageFile = $this->request->getFile('image');
        $filepath = storeImage('Committee', $imageFile);
        $data['image'] = $filepath;

        $data['start_date'] = $data['startyear'];

    if (empty($data['endyear'])) {
        $data['end_date'] = null; // Set end_date to null if endyear is empty
        $data['present'] = true;  // Set the 'present' checkbox to checked
    } else {
        $data['end_date'] = $data['endyear'];
        unset($data['present']); // Unset the 'present' field as it's not needed when there's an end_date
    }

        $committee = new committee();
        $committee->fill($data);

        return ($this->committeeModel->save($committee))
            ? toast('success', lang('Admin.committee.create.succes'))
            : toast('danger',  lang('Admin.committee.create.error'));
    }

    public function delete(int $param)
    {
        $currentCommittee = $this->committeeModel->find($param);
        return ($this->committeeModel->delete($param))
            ? toast('success', lang('Admin.committee.update.success'))
            : toast('danger',  lang('Admin.committee.update.error'));
    }
    public function removeMember(int $param)
    {
        return ($this->committeeUserModel->delete($param))
            ? toast('success', lang('Admin.committee.removeMember.success'))
            : toast('danger',  lang('Admin.committee.removeMember.error'));
    }

    public function addMember()
    {
        $committeeID = $this->request->getPost('committeeID');
        $userIDs = $this->request->getPost('userID');

        if (empty($userIDs)) {
            return toast('danger', lang('Admin.committee.requiredUsers'));
        }

        $memberEntities = array_map(function ($userID) use ($committeeID) {
            $member = new CommitteeUser();
            $member->userID = $userID;
            $member->committeeID = $committeeID;
            return $member;
        }, $userIDs);

        return ($this->committeeUserModel->insertBatch($memberEntities))
            ? toast('success', lang('Admin.committee.addMember.success'))
            : toast('danger',  lang('Admin.committee.addMember.error'));
    }
}

