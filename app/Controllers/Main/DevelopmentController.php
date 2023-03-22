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
            $statement = 'SELECT DISTINCT nsca_devs.*, nsca_dev_types.min_age, nsca_dev_types.max_age,
            CASE WHEN nsca_dev_users.userID IS NULL THEN 0 ELSE 1 END AS is_registered
            FROM nsca_devs';
            $statement .= ' LEFT JOIN nsca_dev_users ON nsca_dev_users.devID = nsca_devs.id AND nsca_dev_users.userID = '.auth()->id();
            $statement .= ' JOIN nsca_dev_types ON nsca_dev_types.id = nsca_devs.typeID;';
        }
        else{
            $statement = 'SELECT nsca_devs.*, nsca_dev_types.min_age, nsca_dev_types.max_age
            FROM nsca_devs
            JOIN nsca_dev_types ON nsca_dev_types.id = nsca_devs.typeID;';
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
