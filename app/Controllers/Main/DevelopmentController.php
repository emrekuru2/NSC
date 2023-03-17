<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\UserTypes\DevUserModel;

class DevelopmentController extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
        $devModel = model(DevModel::class);

        $data = [
            'programs'  => $devModel->programs(),
=======
        $db = \Config\Database::connect();
        $builder = $db->table('nsca_dev');
        $query = $db->query('SELECT nsca_dev.*, nsca_devprogram_type.*,
        CASE WHEN nsca_dev_user.userID IS NULL THEN 0 ELSE 1 END AS is_registered
        FROM nsca_dev
        LEFT JOIN nsca_dev_user ON nsca_dev_user.devID = nsca_dev.id AND nsca_dev_user.userID = 1
        JOIN nsca_devprogram_type ON nsca_Devprogram_type.id = nsca_dev.devProgID;');


        $model = model(DevModel::class);
        $data = [
            'programs'  => 
            $query->getResult(),
            'pager' => $model->pager,
>>>>>>> c9db877 (disabled the option for double registeration for dev programs)
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
