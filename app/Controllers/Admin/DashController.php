<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;
use App\Models\ClubModel;
use App\Models\UserTypes\ClubUserModel;
use App\Models\UserTypes\TeamUserModel;
use App\Models\UserModel;
use App\Models\WaitlistModel;
use App\Entities\ClubUser;

class DashController extends BaseController
{
    public function index()
    {

        $data = [
            'title'     => 'Dashboard',
            'users'     => model(UserModel::class)->countAllResults(),
            'players'   => model(TeamUserModel::class)->countAllResults(),
            'clubs'     => model(ClubModel::class)->countAllResults(),
            'teams'     => model(TeamModel::class)->countAllResults(),
            'joinlist'  => model(WaitlistModel::class)->getList()
        ];


        return view('pages/admin/dashboard', $data);
    }
    public function accept_user(){
        $data = $this->request->getPost();
        // get userID
        $userID = $this->request->getVar("userID");
        if ($data["action"]=="accept"){
            // create an entity 
            $entity = new \App\Entities\UserTypes\ClubUser();
            $entity->fill($data);
            model(ClubUserModel::class)->save($entity);
            model(WaitlistModel::class)->delete($data["recordID"]);
            // send email to user telling them they were accepted
        }
        else{
            model(WaitlistModel::class)->delete($data["recordID"]);
            // send email to user telling them they were denied
        }


        return redirect()->back();
    }
}
