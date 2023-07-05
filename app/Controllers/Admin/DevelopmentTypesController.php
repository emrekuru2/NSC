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
    public function create()
    {
        $devType = new \App\Entities\DevType();
        $devType->fill($this->request->getPost());

        return model(DevTypeModel::class)->save($devType)
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'DevType created successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'DevType could not be created']);
    }

    public function edit(int $id)
    {
        $devType = new DevTypeModel();
        $data = [
            'title'  => 'Development Types',
            'currentDev' => $devType->find($id),
            'devType' => $devType->findAll(),
            'editMode' => true,
        ];

        return view('pages/admin/developmentTypes', $data);
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
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'DevType updated successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'DevType could not be updated']);
    }

    public function delete($id = null)
    {
        $devType = new DevTypeModel();
        return $devType->delete($id)
            ? redirect()->back()->with('alert', ['type' => 'success', 'content' => 'DevType deleted successfully'])
            : redirect()->back()->with('alert', ['type' => 'danger', 'content' => 'DevType could not be deleted']);
    }
}
