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
            'programs'  => $model->orderBy('id', 'DESC')->paginate(10),
            'devTypes'  => $devType->findAll(),
            'pager'     => $model->pager,
            'title'     => 'Development',
        ];

        return view('pages/admin/development', $data);
    }

    public function createDev()
    {

        $data = $this->request->getPost();
        $dev = new \App\Entities\Dev();
        $dev->fill($data);

        if (model(DevModel::class)->save($dev)) {
            $data = [
                'type'    => 'success',
                'content' => 'Development program created successfully'
            ];

            return redirect()->back()->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'Development program could not be created'
        ];

        return redirect()->back()->with('alert', $data);
    }

    public function createProgType()
    {

        $data = $this->request->getPost();
        $devType = new \App\Entities\DevType();
        $devType->fill($data);

        if (model(DevTypeModel::class)->save($devType)) {
            $data = [
                'type'    => 'success',
                'content' => 'Development program created successfully'
            ];

            return redirect()->back()->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'Development program could not be created'
        ];

        return redirect()->back()->with('alert', $data);
    }
}
