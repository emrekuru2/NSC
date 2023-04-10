<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\ClubJoinlistModel;
use App\Models\ClubModel;

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
        $clubJoinistModel = model(ClubJoinlistModel::class);
        $previousRequest = $clubJoinistModel->select()->where('userID', auth()->id())->first();
        $previousRequestClub = '';
        $previousRequestDate = '';
        if($previousRequest != null){
            $previousRequestClub = $model->select()->where('id', $previousRequest->clubID)->first()->name;
            $previousRequestDate = $clubJoinistModel->select()->where('userID', auth()->id())->first()->updated_at;
        }

        $data = [
            'clubs'  => $model->findAll(),
            'previousRequest' => $previousRequest,
            'previousRequestClub' => $previousRequestClub,
            'previousRequestDate' => $previousRequestDate,
            'title' => 'Join club',
        ];
        return view('pages/club_join', $data);
    }


    public function joinClub(){
        $clubJoinistModel = model(ClubJoinlistModel::class);
        $clubModel = model(ClubModel::class);

        // checking if the user submitted a request before
        $checkUser = $clubJoinistModel->select()->where('userID', auth()->id())->first();

        if($checkUser != NULL){
            // updating the user's request
            $checkUser->clubID = $clubModel->select()->where('name', $_POST['clubs-select'])->first()->id;
            if ($clubJoinistModel->save($checkUser)) {
                $data = [
                    'type'    => 'success',
                    'content' => 'Your request was updated successfully'
                ];
            } else {
                $data = [
                    'type'    => 'danger',
                    'content' => 'Failed to submit your request'
                ];
            }

        } else {
            // adding the user request
            $currentUser = new \App\Entities\UserTypes\ClubUser();
            $currentUser->userID = auth()->id();
            $clubID = $clubModel->select()->where('name', $_POST['clubs-select'])->first()->id;
            $currentUser->clubID = $clubID;

            // saving the current (new) user
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
        }   
    
        return redirect()->back()->with('alert', $data);
    }


    public function deleteRequest(){
        $clubJoinistModel = model(ClubJoinlistModel::class);
        $previousRequestID = $clubJoinistModel->select()->where('userID', auth()->id())->first()->id;

        if($clubJoinistModel->delete($previousRequestID)){
            $data = [
                'type'    => 'success',
                'content' => 'Your request was deleted successfully'
            ];
        }else{
            $data = [
                'type'    => 'danger',
                'content' => 'Failed to delete your request'
            ];
        }

        return redirect()->back()->with('alert', $data);
    }
    






}
