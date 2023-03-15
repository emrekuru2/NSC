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

        try {
            //$teamName = $this->request->getGet('name')[0];

            //$team = $teamModel->findTeamByName($teamName);
            //$teamMembers = $userModel->getTeamUsersByTeamName($teamName);
            //$clubMembers = $userModel->getClubUsersByClubName($teamName);
        } catch (Exception $e) {

        }

        $data = [
            'title' => 'Clubs',
            'clubs' => $clubModel->findAll()
        ];

        return view('pages/admin/clubs', $data);
    }

    public function edit()
    {
        if (isset($_POST['formSubmit'])) {
            if($_POST['formSubmit'] == 'Submit'){

                $data = [
                    'type'    => 'success',
                    'content' => 'Clubs updated successfully'
                ];

                return redirect()->back()->with('alert', $data);
            }   
        } else {

            $data = [
                'type'    => 'danger',
                'content' => '' . print_r($clubModel->printDebugger(), true)
            ];

            return redirect()->back()->with('alert', $data);
        }
    }
}
