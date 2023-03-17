<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TeamModel;
use App\Models\ClubModel;

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

    public function editUser(int $id)
    {

        $data = [
            'title' => 'User Editing',
            'user'  => model(UserModel::class)->find($id), 
            'teams' => model(TeamModel::class)->findAll(),
            'clubs' => model(ClubModel::class)->findAll()
        ];


        return view('pages/admin/edit_user', $data);
    }
}
