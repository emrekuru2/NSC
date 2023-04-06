<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\CommitteeModel;
use App\Models\DevModel;
use App\Models\LocationModel;
use App\Models\TeamModel;
use App\Models\UserEmailModel;
use Exception;

class EmailController extends BaseController
{
    public function index()
    {
        $clubModel      = model(ClubModel::class);
        $teamModel      = model(TeamModel::class);
        $committeeModel = model(CommitteeModel::class);
        $locationModel  = model(LocationModel::class);
        $devModel       = model(DevModel::class);

        $data = [
            'title'      => 'Email',
            'clubs'      => $clubModel->findAll(),
            'teams'      => $teamModel->findAll(),
            'committees' => $committeeModel->findAll(),
            'locations'  => $locationModel->findAll(),
            'devs'       => $devModel->findAll(),
        ];

        return view('pages/admin/email', $data);
    }

    public function sendEmail()
    {
        $subject    = $this->request->getVar('subject');
        $message    = $this->request->getVar('message');
        $stringJSON = $this->request->getVar('groups');
        $JSON       = json_decode($stringJSON);

        $recipientArray = [];

        // Individuals
        $recipientArray[] = $JSON->recipients;

        // Groups
        $userEmailModel = model(UserEmailModel::class);

        foreach ($JSON->general as $group) {
            switch ($group) {
                case 'all-users':
                    $allMembers = $userEmailModel->getAllUserEmails();

                    foreach ($allMembers as $member) {
                        $recipientArray[] = $member->email;
                    }
                    break;

                case 'all-clubs':
                    $allClubMembers = $userEmailModel->getAllClubMemberEmails();

                    foreach ($allClubMembers as $member) {
                        $recipientArray[] = $member->email;
                    }
                    break;

                case 'all-programs':
                    $allDevProgramMembers = $userEmailModel->getAllDevProgramMemberEmails();

                    foreach ($allDevProgramMembers as $member) {
                        $recipientArray[] = $member->email;
                    }
                    break;
            }
        }

        foreach ($JSON->club as $clubID) {
            $clubMembers = $userEmailModel->getClubMemberEmailsByID($clubID);

            foreach ($clubMembers as $member) {
                $recipientArray[] = $member->email;
            }
        }

        foreach ($JSON->team as $teamID) {
            $teamMembers = $userEmailModel->getTeamMemberEmailsByID($teamID);

            foreach ($teamMembers as $member) {
                $recipientArray[] = $member->email;
            }
        }

        foreach ($JSON->committee as $committeeID) {
            $committeeMembers = $userEmailModel->getCommitteeMemberEmailsByID($committeeID);

            foreach ($committeeMembers as $member) {
                $recipientArray[] = $member->email;
            }
        }

        foreach ($JSON->location as $locationID) {
            $locationMembers = $userEmailModel->getLocationMemberEmailsByID($locationID);

            foreach ($locationMembers as $member) {
                $recipientArray[] = $member->email;
            }
        }

        foreach ($JSON->dev as $devID) {
            $devProgramMembers = $userEmailModel->getDevProgramMemberEmailsByID($devID);

            foreach ($devProgramMembers as $member) {
                $recipientArray[] = $member->email;
            }
        }

        $email = \Config\Services::email();

        $failedRecipients = [];

        foreach ($recipientArray as $recipient) {
            try {
                $email->setTo($recipient);
            } catch (Exception $e) {
                $failedRecipients[] = $recipient;
            }
        }

        $email->setFrom('testadmin@cricketnovascotia.ca', 'Confirm Registration');
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            $data = [
                'type'    => 'success',
                'content' => 'Email sent successfully',
                'failed'  => $failedRecipients,
            ];

            return redirect()->back()->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'Error occurred while sending email',
            'failed'  => $failedRecipients,
        ];

        return redirect()->back()->with('alert', $data);
    }
}
