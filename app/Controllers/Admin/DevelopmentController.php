<?php

namespace App\Controllers\Admin;
use CodeIgniter\I18n\Time;

use App\Controllers\BaseController;
use DevModel;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Development'
        ];
        
        
        return view('pages/admin/development', $data);
    }

    public function createDev()
    {

        $name = $this->request->getVar('name');
        $start_time = $this->request->getVar('start_time');
        $end_time = $this->request->getVar('end_time');
        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        $days = $this->request->getVar('days');
        $price = $this->request->getVar('price');
        $location = $this->request->getVar('location');
        $description = $this->request->getVar('description');
        $image = $this->request->getVar('image');

        $dev = new \App\Entities\Dev();
        $devmodel = model(DevModel::class);
        $dev->name = $name;
        $dev->start_time = $start_time;
        $dev->end_time = $end_time;
        $dev->start_date = $start_date;
        $dev->end_date = $end_date;
        $dev->price = $price;
        $dev->location = $location;
        $dev->description = $description;
        $dev->image = $image;
        $dev->daysRun = $days;
        

        $devmodel->save($dev);

        $data = [
            'title' => 'Development',
            'type' => 'success',
            'content' => 'Development program created successfully'
        ];

        return view('pages/admin/development', $data);

    }
}