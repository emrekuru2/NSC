<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class HomeController extends BaseController
{

    public function index()
    {

        $data['title'] = 'Home';

        return view('pages/home', $data);
      
    }

    
}
