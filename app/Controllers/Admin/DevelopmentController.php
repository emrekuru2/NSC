<?php

namespace App\Controllers\Admin;
use CodeIgniter\I18n\Time;

use App\Controllers\BaseController;
use DevModel;
use DevTypeModel;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $model = model(DevModel::class);
        $devType = model(DevTypeModel::class);
        $data = [
            'programs'  => $model->orderBy('start_date', 'ASC')->paginate(10),
            'devTypes' => $devType->findAll(),
            'pager' => $model->pager,
            'title' => 'Development',
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
        // create a string of all days separated by a comma
        $daysRun = implode(", ", $days);
        $devType = $this->request->getVar('devType');
        echo $devType;
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
        $dev->daysRun = $daysRun;
        $dev->devProgID = $devType;
        

        $devmodel->save($dev);

        $data = [
            'title' => 'Development',
            'type' => 'success',
            'content' => 'Development program created successfully'
        ];

        return view('pages/admin/development', $data);
    }

    public function createProgType()
    {

        $name = $this->request->getVar('name');
        $min_age = $this->request->getVar('min_age');
        $max_age = $this->request->getVar('max_age');

        $dev = new \App\Entities\DevType();
        $devmodel = model(DevTypeModel::class);
        $dev->type_name = $name;
        $dev->min_age = $min_age;
        $dev->max_age = $max_age;

        $devmodel->save($dev);

        $data = [
            'title' => 'Development',
            'type' => 'success',
            'content' => 'Development program created successfully'
        ];

        return view('pages/admin/development', $data);

    }
}