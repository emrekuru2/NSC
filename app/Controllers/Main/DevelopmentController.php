<?php
namespace App\Controllers\Main;

use App\Controllers\BaseController;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('nsca_dev');
        // create string
        if (auth()->loggedIn()){
            $statement = 'SELECT nsca_dev.*, nsca_devprogram_type.*,
            CASE WHEN nsca_dev_user.userID IS NULL THEN 0 ELSE 1 END AS is_registered
            FROM nsca_dev';
            $statement .= ' LEFT JOIN nsca_dev_user ON nsca_dev_user.devID = nsca_dev.id AND nsca_dev_user.userID = '.auth()->id();
            $statement .= ' JOIN nsca_devprogram_type ON nsca_Devprogram_type.id = nsca_dev.devProgID;';
        }
        else{
            $statement = 'SELECT nsca_dev.*, nsca_devprogram_type.*
            FROM nsca_dev
            JOIN nsca_devprogram_type ON nsca_Devprogram_type.id = nsca_dev.devProgID;';
        }
        
        $query = $db->query($statement);

        $model = model(DevModel::class);
        $data = [
            'programs'  => 
            $query->getResult(),
            'pager' => $model->pager,
            'title' => 'Development',
        ];

        return view('pages/development', $data);
    }
    public function register(int $programID)
    {

        

        $currentUser = new \App\Entities\DevUser();
        $currentUser->devID = $programID;
        $currentUser->userID = auth()->id();
        $devModel = model(DevUserModel::class);
        $devModel->save($currentUser);


        $data = [
            'title' => 'Development',
        ];

        return redirect()->to('development');
    }

}