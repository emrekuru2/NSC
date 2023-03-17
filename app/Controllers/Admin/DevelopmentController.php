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
        // explode the date string into an array
        $days = $this->request->getVar('days');
        $daysRun = implode(",", $days);
        $dev->fill($data);
        $dev->daysRun = $daysRun;

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
    // TODO - Add edit and delete functions
    public function modify()
    {
        $DevModel = model(DevModel::class);
        $devType = model(DevTypeModel::class);
        $id = $this->request->getPost('id');
        // get the dev program
        $dev = $DevModel->find($id);
        $devID = $devType->find($id);

        // get all users registered to the program
        $users = $DevModel->getUsers($id);


        $data = [
            'program'     => $dev,
            'users'       => $users,
            'devTypes'  => $devType->findAll(),
            'title'    => $dev->name . " - Modify",
        ];

        return view('pages/admin/development_modify', $data);
    }
    public function modifyProgram(){
        $devModel = model(DevModel::class);
        $devType = model(DevTypeModel::class);
        $data = $this->request->getPost();
        $id = $this->request->getVar('id');
        $days = $this->request->getVar('days');
        $daysRun = implode(",", $days);

        $dev = new \App\Entities\Dev();
        $dev->fill($data);
        $dev->daysRun = $daysRun;

        if ($id == NULL){
            $data = [
                "title" => "Error"
            ];
            return view('pages/admin/dashboard', $data);
        }
        $devModel->update(array('id' => $id), $dev);

        $data = [
            'programs'  => $devModel->orderBy('id', 'DESC')->paginate(10),
            'devTypes'  => $devType->findAll(),
            'type'    => 'success',
            'title' => 'Development',
            'content' => 'Development program modified successfully'
        ];
        return view('pages/admin/development', $data);
    }
    public function deleteProgram(){
        $devModel = model(DevModel::class);
        $devType = model(DevTypeModel::class);
        $id = $this->request->getVar('id');
        $devModel->delete($id);

        $data = [
            'programs'  => $devModel->orderBy('id', 'DESC')->paginate(10),
            'devTypes'  => $devType->findAll(),
            'type'    => 'success',
            'title' => 'Development',
            'content' => 'Development program deleted successfully'
        ];
        return view('pages/admin/development', $data);
    }
}
