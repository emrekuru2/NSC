<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\TeamModel;
use App\Models\UserModel;
use App\Models\UserTypes\TeamUserModel;
use App\Models\WaitlistModel;

class DashController extends BaseController
{
    public function index()
    {
        $data = [
            'title'    => 'Dashboard',
            'users'    => model(UserModel::class)->countAllResults(),
            'players'  => model(TeamUserModel::class)->countAllResults(),
            'clubs'    => model(ClubModel::class)->countAllResults(),
            'teams'    => model(TeamModel::class)->countAllResults(),
            'joinlist' => model(WaitlistModel::class)->getList(),
        ];

        return view('pages/admin/dashboard', $data);
    }
}
