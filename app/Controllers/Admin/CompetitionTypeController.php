<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\competitionTypeModel;

class CompetitionTypeController extends BaseController
{
    public function index()
    {
        $competitionType = new competitionTypeModel();

        $data = [
            'competitionType' => $competitionType->findAll(),
            'title'           => 'Competitions Type',
        ];

        return view('pages/admin/competitionType', $data);
    }

    public function store()
    {
        $competitionTypeModel = new competitionTypeModel();
        $data                 = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        $competitionTypeModel->save($data);
        header('Refresh:0');

        // return redirect('/admin/competitionType');
    }

    public function edit($id = null)
    {
        $competitionType = new competitionTypeModel();

        $data = [
            'competitionType' => $competitionType->find($id),

            'title' => 'Competitions Type',
        ];

        return view('pages/admin/competitionTypeEdit', $data);
    }

    public function check($id = null)
    {
        $competitionType = new competitionTypeModel();

        $data = [
            'competitionType' => $competitionType->find($id),

            'title' => 'Competitions Type'
        ];
        return view('pages/admin/competitionTypeCheck', $data);
    }

    public function check($id = null)
    {
        $competitionType = new competitionTypeModel();

        $data = [
            'competitionType' => $competitionType->find($id),

            'title' => 'Competitions Type'
        ];
        return view('pages/admin/competitionTypeCheck', $data);
    }

    public function update($id = null)
    {
        $competitionType = new competitionTypeModel();
        $data            = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        $competitionType->update($id, $data);

        return redirect()->to(base_url('admin/CompetitionType'))->with('status', 'successes');
    }

    public function delete($id = null)
    {
        $competitionType = new competitionTypeModel();
        $competitionType->delete($id);

        return redirect()->to(base_url('admin/CompetitionType'))->with('status', 'successes');
    }
}
