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
        $from1 = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        // set email
        $email = \Config\Services::email();
        $email->setFrom($from1);
        $email->setTo('connormacintyre14@gmail.com');
        $email->setSubject($subject);
        $email->setMessage($message);

        $email->send();
        return redirect()->back();
    }

}
