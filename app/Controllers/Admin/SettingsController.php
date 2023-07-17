<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Model\UserEntityModel;

class SettingsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Settings',
            'user'  => auth()->user()
        ];

        return view('pages/admin/settings', $data);
    }

    public function backup()
    {
        helper('filesystem');
        $db = \Config\Database::connect();
        $dbname = $db->database;
        $path = WRITEPATH . 'uploads/';
        $filename = $dbname . '_' . date('d_M-Y');
        $prefs = ['filename' => $filename, 'format' => 'sql'];

        $util = (new \App\Database\Utils($db));
        $backup = $util->backup($prefs, $db);

        write_file($path . $filename . '.sql', $backup);
        return $this->response->download($path . $filename . '.sql', null);
    }

    public function updatePassword()
{
    $model = model(UserEntityModel::class);

    $rules = [
        'oldPassword' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'You must provide your old password.'
            ]
        ],
        'newPassword' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'You must provide a new password.'
            ]
        ],
        'newConfirmPassword' => [
            'rules' => 'required|matches[newPassword]',
            'errors' => [
                'required' => 'You must confirm your new password.',
                'matches' => 'The confirmation password does not match the new password.'
            ]
        ]
    ];

    if (!$this->validate($rules)) {
        // validation failed, handle error here
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $oldPassword = $this->request->getPost('oldPassword');
    $newPassword = $this->request->getPost('newPassword');
   

    $model->whereIn('userID', auth()->user()->id)->set('secret2', password_hash($newPassword, PASSWORD_DEFAULT))->update();

    session()->setFlashdata('message', 'Password updated successfully');
    return redirect()->back();
}

    


    public function updateInformation()
    {
        $user = auth()->user();
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'street' => $this->request->getPost('street'),
            'city' => $this->request->getPost('city'),
            'region' => $this->request->getPost('region'),
            'postal' => $this->request->getPost('postal'),
        
        ];
        model(UserModel::class)->update($user->id, $data);
        return redirect()->back()->with('message', 'Information updated successfully');
    }
}
