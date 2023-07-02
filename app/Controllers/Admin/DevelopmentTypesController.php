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
            'editMode' => false,
        ];

        return view('pages/admin/developmentTypes', $data);
    }
    public function store()
    {
        $devType = new DevTypeModel();
        $data                 = [
            'name'        => $this->request->getPost('name'),
            'desc' => $this->request->getPost('desc'),
            'min_age' => $this->request->getPost('min_age'),
            'max_age' => $this->request->getPost('max_age'),
        ];
        $devType->save($data);
        
        return redirect()->back();
    }

    public function editMode(int $id)
    {
        $devType = new DevTypeModel();
        $data = [
            'title'  => 'Development',
            'currentDev' => $devType->find($id),
            'devType' => $devType->findAll(),
            'editMode' => true,
        ];

        return view('pages/admin/developmentTypes', $data);
    }

    public function edit(int $id)
    {
        $devType = new DevTypeModel();

        $data = [
            'devType' => $devType->find($id),
            'title' => 'Development Type',
        ];

        return view('pages/admin/developmentType', $data);
    }

    public function check($id = null)
    {
        $devType = new DevTypeModel();

        $data = [
            'devType' => $devType->find($id),
            'title' => 'Development Type'
        ];
        return view('pages/admin/developmentTypeCheck', $data);
    }

    public function update(int $id)
    {
        $devType = new DevTypeModel();
        return $devType->update($id, $this->request->getPost())
            ? redirect()->back()->with('dev', ['type' => 'success', 'content' => 'DevType updated successfully'])
            : redirect()->back()->with('dev', ['type' => 'danger', 'content' => 'DevType could not be updated']);
    }

    // public function update($id = null)
    // {
    //     $devType = new DevTypeModel();
    //     $data            = [
    //         'name'        => $this->request->getPost('name'),
    //         'desc'         => $this->request->getPost('desc'),
    //     ];
    //     $devType->update($id, $data);

    //     return redirect()->to(base_url('admin/developmentTypes'))->with('status', 'successes');
    // }

    public function delete($id = null)
    {
        $devType = new DevTypeModel();
        $devType->delete($id);

        return redirect()->to(base_url('admin/developmentTypes'))->with('status', 'successes');
    }
}
