<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class FaqsController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'FAQs',
        ];

        return view('pages/faqs', $data);
    }
}
