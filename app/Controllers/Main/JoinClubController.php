<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;
use App\Models\ClubJoinlistModel;
use App\Models\ClubModel;
use Exception;

class JoinClubController extends BaseController
{
    public function index()
    {
        $clubModel = model(ClubModel::class);
        $clubJoinListModel = model(ClubJoinlistModel::class);

        $previousRequestClub = '';
        $previousRequestDate = '';
        $previousRequest = $clubJoinListModel->select()->where('userID', auth()->id())->first();
        if($previousRequest != null){
            $previousRequestClub = $clubModel->select()->where('id', $previousRequest->clubID)->first()->name;
            $previousRequestDate = $clubJoinListModel->select()->where('userID', auth()->id())->first()->updated_at;
        }

        $data = [
            'clubs'  => $clubModel->findAll(),
            'previousRequest' => $previousRequest,
            'previousRequestClub' => $previousRequestClub,
            'previousRequestDate' => $previousRequestDate,
            'title' => 'Join Club',
        ];

        return view('pages/club_join', $data);
    }

    public function joinClub(){
        $clubJoinListModel = model(ClubJoinlistModel::class);
        $clubModel = model(ClubModel::class);

        // checking if the user submitted a request before
        $checkUser = $clubJoinListModel->select()->where('userID', auth()->id())->first();

        if($checkUser != null){
            $checkUser->clubID = $clubModel->select()->where('name', $_POST['clubs-select'])->first()->id;

            try {
                if ($clubJoinListModel->save($checkUser)) {
                    $data = [
                        'type'    => 'success',
                        'content' => 'Your request was submitted successfully!'
                    ];
                } else {
                    $data = [
                        'type'    => 'danger',
                        'content' => 'Error while submitting your request. Please try again.'
                    ];
                }
            } catch (Exception $e) {
                $data = [
                    'type'    => 'success',
                    'content' => 'Request has already been submitted.'
                ];
            }

        } else {
            $clubID = $clubModel->select()->where('name', $_POST['clubs-select'])->first()->id;

            $data = [
                'userID' => auth()->id(),
                'clubID' => $clubID
            ];

            $newRequest = new \App\Entities\UserTypes\ClubUser();
            $newRequest->fill($data);

            try {
                if ($clubJoinListModel->save($newRequest)) {
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
            } catch (Exception $e) {
                $data = [
                    'type'    => 'success',
                    'content' => 'Request has already been submitted.'
                ];
            }

        }

        return redirect()->back()->with('alert', $data);
    }


    public function deleteRequest(){
        $clubJoinListModel = model(ClubJoinlistModel::class);
        $previousRequestID = $clubJoinListModel->select()->where('userID', auth()->id())->first()->id;

        if($clubJoinListModel->delete($previousRequestID)){
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
