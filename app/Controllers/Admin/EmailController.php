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
        $stringJSON = $this->request->getVar('groups');
        $JSON = json_decode($stringJSON);

        $email = \Config\Services::email();
        $email->protocol = 'smtp';
        $email->SMTPHost = 'mail.cricketnovascotia.ca';
        $email->SMTPUser = 'testadmin@cricketnovascotia.ca';
        $email->SMTPPass = 'CricketNSCA';
        $email->SMTPPort = 26;
        $email->SMTPCrypto = 'tls';
        $email->BCCBatchMode = true;

        $email->setTo($JSON->recipients); // TODO: Change to BCC.
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
