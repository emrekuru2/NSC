<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClubModel;
use App\Models\UserModel;
use App\Models\UserTypes\ClubUserModel;
use App\Models\UserTypes\TeamUserModel;
use App\Models\WaitlistModel;

class DashController extends BaseController
{
    public function index()
    {
        $data = [
            'title'    => 'Dashboard',
            'users'    => model(UserModel::class)->countAllResults(),
            'players'  => model(TeamUserModel::class)->countAllResults(),
            'clubs'    => model(ClubModel::class)->countAllResults(),
            'teams'    => model(TeamModel::class)->countAllResults(),
            'joinlist' => model(WaitlistModel::class)->getList(),
        ];

        return view('pages/admin/dashboard', $data);
    }

    public function accept_user()
    {
        // get email service
        $email = \Config\Services::email();

        $data = $this->request->getPost();
        // create user entity
        $user = model(UserModel::class)->find($data['userID']);
        // set user email
        $email->setTo($user->email);
        $email->setFrom('testadmin@cricketnovascotia.ca', 'Club Decision');
        // get userID
        $userID = $this->request->getVar('userID');
        if ($data['action'] === 'accept') {
            // create an entity
            $entity = new \App\Entities\UserTypes\ClubUser();
            $entity->fill($data);
            model(ClubUserModel::class)->save($entity);
            model(WaitlistModel::class)->delete($data['recordID']);

            $email->setSubject('You are accepted');
            // generate a message with the user name and club name and send it to the user
            $message = 'Hello ' . $user->first_name . ' ' . $user->last_name . ",\n\n You have been accepted to the club " . $data['club_name'] . ".\n\n Regards,\n\n Cricket Nova Scotia";
            $email->setMessage($message);
        } else {
            model(WaitlistModel::class)->delete($data['recordID']);
            // send email to user telling them they were denied
            $email->setSubject('You are rejected');
            $message = 'Hello ' . $user->first_name . ' ' . $user->last_name . ",\n\n You have been rejected from the club " . $data['club_name'] . ".\n\n Regards,\n\n Cricket Nova Scotia";
            $email->setMessage($message);
        }
        $email->send();

        return redirect()->back();
    }
}
