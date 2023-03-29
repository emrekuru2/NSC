<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TeamModel;
use App\Models\ClubModel;
use App\Models\UserTypes\ClubUserModel;
use App\Models\UserTypes\TeamUserModel;
use CodeIgniter\Shield\Models\PermissionModel;

class UsersController extends BaseController
{
    public function index()
    {

        $model = model(UserModel::class);

        $data = [
            'title' => 'Users',
            'users' => $model->findAll(10, 1)
        ];


        return view('pages/admin/users', $data);
    }

    public function userDetails(int $id)
    {

        $data = [
            'title' => 'User Editing',
            'user'  => model(UserModel::class)->find($id),
            'teams' => model(TeamModel::class)->findAll(),
            'clubs' => model(ClubModel::class)->findAll()
        ];


        return view('pages/admin/edit_user', $data);
    }

    public function searchUserDetails()
    {
        $name = esc($this->request->getVar('search'));

        $firstname = explode(' ', $name)[0];
        $user = model(UserModel::class)->where('first_name', $firstname)->first();

        if ($user == null) return redirect()->back();

        $data = [
            'title' => 'User Editing',
            'user'  => $user,
            'teams' => model(TeamModel::class)->findAll(),
            'clubs' => model(ClubModel::class)->findAll()
        ];

        return view('pages/admin/edit_user', $data);
    }

    public function editUser(int $id)
    {

        $data = $this->request->getPost();

        if (isset($data['role'])) {
            $row = model(PermissionModel::class)->where('user_id', $id)->first();
            model(PermissionModel::class)->update($row['id'], ['permission' => $data['role']]);
        }

        if (isset($data['team'])) {
            $row = model(TeamUserModel::class)->where('userID', $id);
            model(TeamUserModel::class)->update($row->id, ['teamID' => $data['team']]);
        }

        if (isset($data['club'])) {
            $row = model(ClubUserModel::class)->where('userID', $id);
            model(ClubUserModel::class)->update($row->id, ['clubID' => $data['club']]);
        }

        return redirect()->back();
    }
}
