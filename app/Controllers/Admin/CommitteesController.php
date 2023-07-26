<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Interfaces\CRUD;
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

        if ($this->request->getVar('present')) {
            $data['years'] = $data['startyear'] . ' - Present';
        } else {
            $data['years'] = $data['startyear'] . ' - ' . $this->request->getVar('endyear');
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

        if ($this->request->getVar('present')) {
            $data['years'] = $data['startyear'] . ' - Present';
        } else {
            $data['years'] = $data['startyear'] . ' - ' . $this->request->getVar('endyear');
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
}

 // public function index()
    // {
    //     $committieesModel = new \App\Models\CommitteeModel();

    //     $data = [
    //         'committiees' => $committieesModel->findAll(),
    //         'title'       => 'Committees',
    //         'editMode' => false,
    //     ];

    //     return view('pages/admin/committees', $data);
    // }


    // public function createCommittee()
    // {
    //     helper('image');

    //     $committieesModel = new CommitteeModel();

    //     $name      = $this->request->getVar('name');
    //     $startyear = $this->request->getVar('startyear');

    //     if ($this->request->getVar('endyear') === null) {
    //         $startyear = $startyear . ' - Present';
    //     } else {
    //         $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
    //     }
    //     $image = $this->request->getFile('image');
    //     if ($image->isValid()) {
    //         $filePath = storeImage('Committee', $image);
    //     } else {
    //         $filePath = 'assets/images/Committee/default.png';
    //     }
    //     $data = [
    //         'name'        => $name,
    //         'years'       => $startyear,
    //         'description' => $this->request->getVar('description'),
    //         'image'       => $filePath,
    //     ];

    //     $committieesModel->insert($data);

    //     return redirect()->to('/admin/committees');
    // }
    // public function createCommittee()
    // {
    //     helper('image');

    //     $committieesModel = new CommitteeModel();

    //     $name      = $this->request->getVar('name');
    //     $startyear = $this->request->getVar('startyear');

    //     if ($this->request->getVar('endyear') === null) {
    //         $startyear = $startyear . ' - Present';
    //     } else {
    //         $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
    //     }
    //     $image = $this->request->getFile('image');
    //     if ($image->isValid()) {
    //         $filePath = storeImage('Committee', $image);
    //     } else {
    //         $filePath = 'assets/images/Committee/default.png';
    //     }
    //     $data = [
    //         'name'        => $name,
    //         'years'       => $startyear,
    //         'description' => $this->request->getVar('description'),
    //         'image'       => $filePath,
    //     ];

    //     $committieesModel->insert($data);

    //     return redirect()->to('/admin/committees');
    // }

// public function updateCommittee()
//     {
//         $committeeModel = model(CommitteeModel::class);
//         $userModel = model(UserModel::class);
//         $users = $userModel->findAll();

//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             // Process the form data and update the committee
//             $committee = new \App\Entities\Committee();

//             $data = $this->request->getPost();
//             $id = $this->request->getVar('id');
//             $startyear = $this->request->getVar('startyear');

//             if ($this->request->getVar('endyear') === null) {
//                 $startyear = $startyear . ' - Present';
//             } else {
//                 $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
//             }
//             $data['years'] = $startyear;
//             $committee->fill($data);

//             $committeeModel->update(['id' => $id], $committee);

//             // remove all users from committee
//             $committeeUserModel = model(CommitteeUserModel::class);
//             $committeeUserModel->where('committeeID', $id)->delete();

//             // loop through all selected users
//             $users = $this->request->getPost('users');
//             if ($users !== null) {
//                 foreach ($users as $user) {
//                     $userModel = model(CommitteeUserModel::class);
//                     // create new record in committee_user table
//                     $userModel->insert([
//                         'userID' => $user,
//                         'committeeID' => $id,
//                     ]);
//                 }
//             }

//             $data = [
//                 'committiees' => $committeeModel->findAll(),
//                 'title' => 'Committees',
//             ];

//             return redirect()->route('admin_committees');
//         }
//     }

//     public function editCommittee()
//     {
//         $committeeModel = model(CommitteeModel::class);
//         $userModel = model(UserModel::class);
//         $users = $userModel->findAll();
        
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             // Process the form data and update the committee
//             $committee = new \App\Entities\Committee();
        
//             $data = $this->request->getPost();
//             $id = $this->request->getVar('id');
//             $startyear = $this->request->getVar('startyear');
        
//             if ($this->request->getVar('endyear') === null) {
//                 $startyear = $startyear . ' - Present';
//             } else {
//                 $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
//             }
//             $data['years'] = $startyear;
//             $committee->fill($data);
        
//             $committeeModel->update(['id' => $id], $committee);
        
//             // remove all users from committee
//             $committeeUserModel = model(CommitteeUserModel::class);
//             $committeeUserModel->where('committeeID', $id)->delete();
        
//             // loop through all selected users
//             $users = $this->request->getPost('users');
//             if ($users !== null) {
//                 foreach ($users as $user) {
//                     $userModel = model(CommitteeUserModel::class);
//                     // create a new record in the committee_user table
//                     $userModel->insert([
//                         'userID' => $user,
//                         'committeeID' => $id,
//                     ]);
//                 }
//             }
        
//             $data = [
//                 'committiees' => $committeeModel->findAll(),
//                 'title' => 'Committees',
//             ];
        
//             return redirect()->route('admin_committees');
//         } else {
//             // Display the edit committee view
//             $committeeID = $this->request->getPost('id');
//             $committee = $committeeModel->find($committeeID);
        
//             if ($committee === null) {
//                 return $this->index();
//             }
        
//             $years = explode(' - ', $committee->years);
        
//             $members = $committeeModel->getMembers($committee->id);
//             $memberIDs = [];
        
//             foreach ($members as $member) {
//                 $memberIDs[] = $member->userID;
//             }
        
//             $data = [
//                 'users' => $users,
//                 'members' => $memberIDs,
//                 'committee' => $committee,
//                 'years' => $years,
//                 'isActive' => $years[1] === 'Present',
//                 'title' => 'Modify Committee',
//                 'editMode' => true,
//             ];
        
//             return view('pages/admin/modify_committee', $data);
//         }
//     }
 // public function modify()
    // {
    //     // get a list of all users
    //     $committeeModel = model(CommitteeModel::class);
    //     $userModel      = model(UserModel::class);
    //     $users          = $userModel->findAll();

    //     // Get Committee
    //     if ($this->request->getVar('search') !== null) {
    //         $committeeName = esc($this->request->getPost('search'));
    //         $committee     = $committeeModel->select()->where('name', $committeeName)->first();
    //     } else {
    //         $committeeID = $this->request->getPost('id');
    //         $committee   = $committeeModel->select()->find($committeeID);
    //     }

    //     if ($committee === null) {
    //         return $this->index();
    //     }

    //     $years = explode(' - ', $committee->years);

    //     $members   = $committeeModel->getMembers($committee->id);
    //     $memberIDs = [];

    //     foreach ($members as $member) {
    //         $memberIDs[] = $member->userID;
    //     }

    //     $data = [
    //         'users'     => $users,
    //         'members'   => $memberIDs,
    //         'committee' => $committee,
    //         'years'     => $years,
    //         'isActive'  => $years[1] === 'Present',
    //         'title'     => 'Modify Committee',
    //         'editMode' => true,
    //     ];

    //     return view('pages/admin/modify_committee', $data);
    // }

    // public function modifyCommittee()
    // {
    //     $committeeModel = model(CommitteeModel::class);
    //     $committee      = new \App\Entities\Committee();

    //     $committieesModel = new \App\Models\CommitteeModel();

    //     $data      = $this->request->getPost();
    //     $id        = $this->request->getVar('id');
    //     $startyear = $this->request->getVar('startyear');

    //     if ($this->request->getVar('endyear') === null) {
    //         $startyear = $startyear . ' - Present';
    //     } else {
    //         $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
    //     }
    //     $data['years'] = $startyear;
    //     $committee->fill($data);

    //     $committeeModel->update(['id' => $id], $committee);

    //     // remove all users from committee
    //     $committeeUserModel = model(CommitteeUserModel::class);
    //     $committeeUserModel->where('committeeID', $id)->delete();

    //     // loop through all selected users
    //     $users = $this->request->getPost('users');
    //     if ($users !== null) {
    //         foreach ($users as $user) {
    //             $userModel = model(CommitteeUserModel::class);
    //             // create new record in committee_user table
    //             $userModel->insert([
    //                 'userID'      => $user,
    //                 'committeeID' => $id,
    //             ]);
    //         }
    //     }

    //     $data = [
    //         'committiees' => $committieesModel->findAll(),
    //         'title'       => 'Committees',
    //     ];

    //     return redirect()->route('admin_committees');
    // }

