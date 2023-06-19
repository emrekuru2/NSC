<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DevTypeModel;
class DevelopmentTypesController extends BaseController
{
    public function index()
    {
        $devType = new DevTypeModel();
        $data = [
            'devType' => $devType->findAll(),
            'title'   => 'Development Type',
        ];

        return view('pages/admin/developmentTypes', $data);
    }
    public function store()
    {
        $devType = new DevTypeModel();
        $data                 = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        $devType->save($data);
        header('Refresh:0');

        // return redirect('/admin/competitionType');
    }

    public function edit($id = null)
    {
        $devType = new DevTypeModel();

        $data = [
            'DevType' => (object)$devType->find($id),
            'title' => 'Development Type',
        ];

        return view('pages/admin/developmentTypeEdit', $data);
    }

    public function check($id = null)
    {
        $devType = new DevTypeModel();

        $data = [
            'developmentType' => $devType->find($id),

            'title' => 'Development Type'
        ];
        return view('pages/admin/developmentTypeCheck', $data);
    }
    
    public function update($id = null)
    {
        $devType = new DevTypeModel();
        $data            = [
            'name'        => $this->request->getPost('name'),
            'age'         => $this->request->getPost('min_age'),
        ];
        $devType->update($id, $data);

        return redirect()->to(base_url('admin/developmentTypes'))->with('status', 'successes');
    }

    public function delete($id = null)
    {
        $devType = new DevTypeModel();
        $devType->delete($id);

        return redirect()->to(base_url('admin/developmentTypes'))->with('status', 'successes');
    }
}
