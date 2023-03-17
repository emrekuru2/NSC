<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\UserTypes\DevUserModel;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $devModel = model(DevModel::class);

        $data = [
            'programs'  => $devModel->programs(),
            'title' => 'Development',
        ];

        return view('pages/development', $data);
    }
    
    public function register(int $programID)
    {

        $model = model(DevUserModel::class);

        $currentUser = new \App\Entities\DevUser();
        $currentUser->devID = $programID;
        $currentUser->userID = user_id();
        $devModel = model(DevUserModel::class);
        $devModel->save($currentUser);


        $data = [
            'title' => 'Development',
        ];

        return redirect()->to('development');
    }

}
