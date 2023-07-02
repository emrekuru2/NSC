<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DevModel;
use App\Models\DevTypeModel;
use App\Models\DevUserModel;

class DevelopmentController extends BaseController
{
    public function index()
    {
        $model   = model(DevModel::class);
        $devType = model(DevTypeModel::class);

        $data = [
            'programs' => $model->orderBy('id', 'DESC')->paginate(10),
            'devTypes' => $devType->findAll(),
            'pager'    => $model->pager,
            'title'    => 'Developments',
        ];

        return view('pages/admin/development', $data);
    }

    public function createDev()
    {
        helper('image');
        $data          = $this->request->getPost();
        $data['image'] = storeImage('Dev', $this->request->getFile('image'));
        $dev           = new \App\Entities\Dev();
        // combine values of days array into a string
        $data['daysRun'] = implode(',', $data['days']);

        // get file
        $file = $this->request->getFile('image');
        if ($file->isValid()) {
            // get random name
            $newName = $file->getRandomName();
            $file->store('../../public/assets/images/DevProgs/contents/', $newName);
            // get path and file name
            $data['image'] = '/assets/images/DevProgs/contents/' . $newName;
        }
        $dev->fill($data);

        if (model(DevModel::class)->save($dev)) { 
            $data = [
                'type'    => 'success',
                'content' => 'Development program created successfully',
            ];

            return redirect()->back()->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'Development program could not be created',
        ];

        return redirect()->back()->with('alert', $data);
    }

    public function createProgType()
    {
        $data    = $this->request->getPost();
        $validationRules = [
            'name' => 'required',
            'min_age' => 'required',
            'max_age' => 'required',
            // Add validation rules for other fields that should be required
        ];
        
        // Validate the input data
        if (!$this->validate($validationRules)) {
            $data = [
                'type' => 'danger',
                'content' => 'Please fill in all the required fields',
            ];
            return redirect()->back()->with('alert', $data);
        }

        $devType = new \App\Entities\DevType();
        // combine values of days array into a string

        $devType->fill($data);

        if (model(DevTypeModel::class)->save($devType)) {
            $data = [
                'type'    => 'success',
                'content' => 'Development program created successfully',
            ];

            return redirect()->back()->with('alert', $data);
        }

        $data = [
            'type'    => 'danger',
            'content' => 'Development program could not be created',
        ];

        return redirect()->back()->with('alert', $data);
    }

    public function modify()
    {
        $devModel = model(DevModel::class);
        $devType  = model(DevTypeModel::class);

        // Get Dev Program
        if ($this->request->getVar('search') !== null) {
            $devName = esc($this->request->getPost('search'));
            $dev     = $devModel->select()->where('name', $devName)->first();
        } else {
            $devID = $this->request->getPost('id');
            $dev   = $devModel->select()->find($devID);
        }

        if ($dev === null) {
            return $this->index();
        }
        $users = $devModel->getUsers($dev->id);

        $data = [
            'program'  => $dev,
            'users'    => $users,
            'days'     => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'devTypes' => $devType->findAll(),
            'title'    => $dev->name . ' - Modify',
        ];

        return view('pages/admin/development_modify', $data);
    }

    public function modifyProgram()
    {
        $devModel = model(DevModel::class);
        $devType  = model(DevTypeModel::class);
        $data     = $this->request->getPost();
        $id       = $this->request->getVar('id');
        $days     = $this->request->getVar('days');
        $daysRun  = implode(',', $days);

        $dev = new \App\Entities\Dev();
        $dev->fill($data);
        $dev->daysRun = $daysRun;

        if ($id === null) {
            $data = [
                'title' => 'Error',
            ];

            return view('pages/admin/dashboard', $data);
        }
        $devModel->update(['id' => $id], $dev);

        $data = [
            'programs' => $devModel->orderBy('id', 'DESC')->paginate(10),
            'devTypes' => $devType->findAll(),
            'type'     => 'success',
            'title'    => 'Development',
            'content'  => 'Development program modified successfully',
        ];

        return view('pages/admin/development', $data);
    }

    public function deleteProgram()
    {
        $devModel = model(DevModel::class);
        $devType  = model(DevTypeModel::class);
        $id       = $this->request->getVar('id');
        $devModel->delete($id);
        // remove all users from development program
        $committeeUserModel = model(DevUserModel::class);
        $committeeUserModel->where('devID', $id)->delete();

        $data = [
            'programs' => $devModel->orderBy('id', 'DESC')->paginate(10),
            'devTypes' => $devType->findAll(),
            'type'     => 'success',
            'title'    => 'Development',
            'content'  => 'Development program deleted successfully',
        ];

        return view('pages/admin/development', $data);
    }
}
