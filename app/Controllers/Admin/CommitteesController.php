<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserTypes\CommitteeUserModel;

class CommitteesController extends BaseController
{
    public function index()
    {
        $committieesModel = new \App\Models\CommitteeModel();

        $data = [
            'committiees' => $committieesModel->findAll(),
            'title' => 'Committees'
        ];
        
        
        return view('pages/admin/committees', $data);
    }

    public function createCommittee(){
        helper('image');
        
        $committieesModel = new \App\Models\CommitteeModel();

        $name = $this->request->getVar('name');
        $startyear = $this->request->getVar('startyear');

        if ($this->request->getVar('endyear') == null){
            $startyear = $startyear . ' - Present';
        }
        else{
            $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
        }
        $image = $this->request->getFile('image');
        if ($image->isValid()){
            
            $filePath = storeImage('Committee', $image);
        }
        else{
            $filePath = 'assets/images/Committee/default.png';
        }
        $data = [
            'name' => $name,
            'years' => $startyear,
            'description' => $this->request->getVar('description'),
            'image' => $filePath,
        ];

        $committieesModel->insert($data);

        return redirect()->to('/admin/committees');
    }
    public function modify(){
        // get a list of all users
        $committeeModel = model(CommitteeModel::class);
        $userModel = model(UserModel::class);
        $users = $userModel->findAll();
        // get ID
        $id = $this->request->getPost('id');
        $committee = $committeeModel->find($id);
        $years = explode(' - ', $committee->years);

        $members = $committeeModel->getMembers($id);
        // create array of user IDs
        $memberIDs = [];
        foreach ($members as $member){
            $memberIDs[] = $member->userID;
        }

        $data = [
            'users' => $users,
            'members' => $memberIDs,
            'committee' => $committee,
            'years' => $years,
            'isActive' => $years[1] == 'Present',
            'title' => 'Modify Committee'
        ];
        return view('pages/admin/modify_committee', $data);
    }
    public function modifyCommittee(){
        $committeeModel = model(CommitteeModel::class);
        $committee = new \App\Entities\Committee();

        $committieesModel = new \App\Models\CommitteeModel();

        $data = $this->request->getPost();
        $id = $this->request->getVar('id');
        $startyear = $this->request->getVar('startyear');

        if ($this->request->getVar('endyear') == null){
            $startyear = $startyear . ' - Present';
        }
        else{
            $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
        }
        $data["years"] = $startyear;
        $committee->fill($data);

        $committeeModel->update(array('id' => $id), $committee);

        // remove all users from committee
        $committeeUserModel = model(CommitteeUserModel::class);
        $committeeUserModel->where('committeeID', $id)->delete();

        // loop through all selected users
        $users = $this->request->getPost('users');
        if ($users != null){
            foreach ($users as $user){
                $userModel = model(CommitteeUserModel::class);
                // create new record in committee_user table
                $userModel->insert([
                    'userID' => $user,
                    'committeeID' => $id
                ]);
            }
        }

        $data = [
            'committiees' => $committieesModel->findAll(),
            'title' => 'Committees'
        ];
        
        
        return view('pages/admin/committees', $data);
    }
    public function deleteCommittee(){
        $committieesModel = new \App\Models\CommitteeModel();


        $id = $this->request->getVar('id');
        $committieesModel->delete($id);


        $data = [
            'committiees' => $committieesModel->findAll(),
            'title' => 'Committees'
        ];
        
        return view('pages/admin/committees', $data);

    }
}