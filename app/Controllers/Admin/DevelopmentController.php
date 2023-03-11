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
        // combine values of days array into a string
        $data['daysRun'] = implode(',', $data['days']);

        // get file
        $file = $this->request->getFile('image');
        if ($file->isValid()){
            // get random name
            $newName = $file->getRandomName();
            $file->store("../../public/assets/images/DevProgs/contents/", $newName);
            // get path and file name
            $data["image"] = "/assets/images/DevProgs/contents/".$newName;

        }
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
        // combine values of days array into a string
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
