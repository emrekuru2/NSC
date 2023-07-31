<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    protected $helpers = ['form'];
    protected $currentUser;

    public function __construct() 
    {
        $this->currentUser = auth()->user();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'user'  => $this->currentUser
        ];

        return view('pages/guest/my_profile', $data);
    }

    public function update()
    {

        $data = $this->request->getPost();

        $userModel = new UserModel();

        return ($userModel->update($this->currentUser->id, $data)) 
            ? toast('success', lang('Guest.profile.update.success')) 
            : toast('danger', lang('Guest.profile.update.error '));

        
    }

}
