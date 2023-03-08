<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\CommitteeModel;
use App\Models\DevModel;
use App\Models\RegionModel;
use App\Models\TeamModel;

class EmailController extends BaseController
{
    public function index()
    {
        $clubModel = model(ClubModel::class);
        $teamModel = model(TeamModel::class);
        $committeeModel = model(CommitteeModel::class);
        $regionModel = model(RegionModel::class);
        $devModel = model(DevModel::class);

        $data = [
            'title'   => 'Email',
            'clubs' => $clubModel->findAll(),
            'teams' => $teamModel->findAll(),
            'committees' => $committeeModel->findAll(),
            'regions' => $regionModel->findAll(),
            'devs' => $devModel->findAll()
        ];

        return view('pages/admin/email', $data);
    }

    public function sendEmail()
    { 

        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');
        $stringJSON = $this->request->getVar('groups');
        $JSON = json_decode($stringJSON);

        $email = \Config\Services::email();
        $email->setTo($JSON->recipients);
        $email->setFrom('testadmin@cricketnovascotia.ca', 'Confirm Registration');
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {

            $data = [
                'title'   => 'Email',
                'type'    => 'success',
                'content' => 'Email sent successfully'
            ];

            return view('pages/admin/email', $data);
            
        } else {

            $data = [
                'title'   => 'Email',
                'type'    => 'danger',
                'content' => '' . print_r($email->printDebugger(), true)
            ];
            return view('pages/admin/email', $data);
        }
    }
}
