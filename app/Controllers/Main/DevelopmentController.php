<?php
namespace App\Controllers\Main;

use App\Controllers\BaseController;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $model = model(DevModel::class);
        $data = [
            'programs'  => 
            $model->orderBy('start_date', 'ASC')
            ->join('nsca_devprogram_type', 'nsca_devprogram_type.id = nsca_dev.devProgID')
            ->findAll(),
            'pager' => $model->pager,
            'title' => 'Development',
        ];

        return view('pages/development', $data);
    }
    public function register(int $programID)
    {

        $model = model(DevUserModel::class);

        $currentUser = new \App\Entities\DevUser();
        $currentUser->devID = $programID;
        $currentUser->userID = auth()->id();
        $model->save($currentUser);


        $data = [
            'title' => 'Development',
        ];

        return redirect()->to('development');
    }
}