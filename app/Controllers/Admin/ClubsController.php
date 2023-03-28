<?php

namespace App\Controllers\Admin;

use App\Models\ClubModel;
use App\Models\UserEmailModel;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Files\File;
use App\Controllers\BaseController;

class ClubsController extends BaseController
{
    public function index()
    {
        $clubModel = model(ClubModel::class);
        $userModel = model(UserEmailModel::class);

        if ($this->request->getVar('search') != null) {
            $clubName = $this->request->getVar('search');
            $club = $clubModel->select()->where('name', $clubName)->first();
        }
        else if ($this->request->getVar('name') != null) {
            $clubName = $this->request->getVar('name');
            $club = $clubModel->select()->where('name', $clubName)->first();
        }
        else {
            $club = null;
        }

        $data = [
            'title' => 'Clubs',
            'club' => $club,
            'clubMembers' => $club != null ? $userModel->getClubUsersByClubId($club->id) : null,
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/clubs', $data);
    }

    public function updateClub()
    {
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Clubs',
            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/clubs', $data);
    }

//    public function editClub()
//    {
//        $clubModel = model(ClubModel::class);
//        $userModel = model(UserEmailModel::class);
//
//        if ($this->request->getPost('search') != null) {
//            $clubName = $this->request->getPost('search');
//            $clubRow = $clubModel->select('nsca_clubs.id')->where('nsca_clubs.name', $clubName)->findAll();
//            sizeof($clubRow) > 0 ? $clubID = $clubRow[0]->id : $clubID = -1;
//        } else {
//            $clubID = $this->request->getPost('clubID');
//        }
//
//        $club = $clubModel->where('nsca_clubs.id', $clubID)->findAll();
//
//        $data = [
//            'title' => 'Clubs',
//            'club' => sizeof($club) > 0 ? $club[0] : null,
//            'clubMembers' => sizeof($club) > 0 ? $userModel->getClubUsersByClubId($clubID) : null,
//            'allClubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
//        ];
//
//        return view('pages/admin/clubs', $data);
//    }
}
