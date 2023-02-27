<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    public function index()
    {
        $data = [
            'title'   => 'Email',
        ];


        return view('pages/admin/email', $data);
    }

    public function sendEmail()
    { 

        $to = $this->request->getVar('mailTo');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');

        $email = \Config\Services::email();
        $email->setTo($to);
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
                'content' => 'Email could not be sent!'
            ];
            return view('pages/admin/email', $data);
        }
    }
}
