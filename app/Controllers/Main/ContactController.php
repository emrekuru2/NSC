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
    public function contact_admins(){
        $email = \Config\Services::email();

        $data = $this->request->getPost();

        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $message = $data["message"];
        // set email
        $sendTo = 'connormacintyre14@gmail.com';

        $email->setTo($sendTo);

        $email-setFrom('testadmin@cricketnovascotia.ca', 'feedback');
        $email->setSubject('subject');
        $FullMessage = "recieved from: ".$email."\n\n Message: \n\n".$message;
        $email->setMessage($FullMessage);

        $email->send();
        return redirect()->back();
    }

}
