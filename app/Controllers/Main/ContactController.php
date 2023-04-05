<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class ContactController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Contact',
        ];

        return view('pages/contact', $data);
    }
    public function contactAdmins(){
        $data = $this->request->getPost();

        $name = $data['name'];
        $sentFrom = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        // set email
        $email = \Config\Services::email();
        $email->setFrom($sentFrom, $name);
        $email->setTo('testadmin@cricketnovascotia.ca');
        $email->setSubject($subject);
        $email->setMessage($message);


        $email->send();
            $data = [
                'type'    => 'success',
                'content' => 'Email sent successfully'
            ];
        return redirect()->back()->with('alert', $data);
    }

}
