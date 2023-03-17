<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Files\File;
use App\Controllers\BaseController;

class ClubsController extends BaseController
{
    public function index()
    {
        $clubModel = model(ClubModel::class);
        $userModel = model(UserEmailModel::class);

        $data = [
            'title' => 'Clubs',
            'clubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/clubs', $data);
    }

    public function updateClub()
    {
        $clubModel = model(ClubModel::class);

        $data = [
            'title' => 'Clubs',
            'clubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];

        return view('pages/admin/clubs', $data);
    }

    public function editClub()
    {
        $clubModel = model(ClubModel::class);
        $userModel = model(UserEmailModel::class);

        if (this->request->getPost('clubName') != null) {
            $clubRow = $clubModel->select('id')->findAll()[0];
            $clubID = $clubRow->id;
        } else {
            $clubID = $this->request->getPost('clubID');
        }

        $club = $clubModel->where('nsca_clubs.id', $clubID)->findAll();

        $data = [
            'title' => 'Clubs',
            'club' => sizeof($club) > 0 ? $club[0] : null,
            'clubMembers' => sizeof($club) > 0 ? $userModel->getClubUsersByClubId($clubID) : null,
            'clubs' => $clubModel->select()->orderBy('nsca_clubs.name', 'ASC')->findAll()
        ];
    }
}
