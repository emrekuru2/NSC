<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Entities\UserTypes\ClubUser;
use App\Models\ClubJoinlistModel;
use App\Models\ClubModel;
use App\Models\UserTypes\ClubUserModel;

class ClubsController extends BaseController
{
    public function index()
    {
        $model = model(ClubModel::class);

        $data = [
            'clubs' => $model->findAll(),
            'title' => 'Clubs',
        ];

        return view('pages/clubs', $data);
    }

    public function viewClubs(){

        $model = model(ClubModel::class);
        $data = [
            'clubs'  => $model->findAll(),
            'title' => 'Join club',
        ];
        return view('pages/club_join', $data);
    }

    
    public function joinClub(){
        $clubJoinistModel = model(ClubJoinlistModel::class);
        $clubModel = model(ClubModel::class);
        $currentUser = new \App\Entities\UserTypes\ClubUser();
        $currentUser->userID = auth()->id();
        $clubID = $clubModel->select()->where('name', $_POST['clubs-select'])->first()->id;
        $currentUser->clubID = $clubID;

        
        if ($clubJoinistModel->save($currentUser)) {
            $data = [
                'type'    => 'success',
                'content' => 'Your request was submitted successfully'
            ];
        } else {
            $data = [
                'type'    => 'danger',
                'content' => 'Failed to submit your request'
            ];
        }
        
    
        return redirect()->back()->with('alert', $data);
    }
    






}
