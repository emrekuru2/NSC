<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CompetitionModel;

class CompetitionsController extends BaseController
{
    public function index()
    {
        $competition = new CompetitionModel();

        $data = [
            'competition' => $competition->findAll(),
            'title'       => 'Competitions',
        ];

        return view('pages/admin/competitions', $data);
    }

    public function store()
    {
        $competitionModel = new CompetitionModel();
        $data             = [
            'name'            => $this->request->getPost('name'),
            'description'     => $this->request->getPost('description'),
            'YearRunning'     => $this->request->getPost('yearRunning'),
            'competitionType' => $this->request->getPost('competitionType'),

        ];

        $competitionModel->save($data);
        header('Refresh:0');

        // return redirect('/admin/competitionType');
    }

    public function edit($id = null)
    {
        $competitionModel = new CompetitionModel();

        $data = [
            'competition' => $competitionModel->find($id),

            'title' => 'Competitions',
        ];

        return view('pages/admin/competitionsEdit', $data);
    }

    public function check($id = null)
    {
        $competitionModel = new CompetitionModel();

        $data = [
            'competition' => $competitionModel->find($id),

            'title' => 'Competitions',
        ];

        return view('pages/admin/competitionCheck', $data);
    }

    public function update($id = null)
    {
        $competitionModel = new CompetitionModel();
        $data             = [
            'name'            => $this->request->getPost('name'),
            'description'     => $this->request->getPost('description'),
            'YearRunning'     => $this->request->getPost('yearRunning'),
            'competitionType' => $this->request->getPost('competitionType'),
        ];
        $competitionModel->update($id, $data);

        return redirect()->to(base_url('admin/competitions'))->with('status', 'successes');
    }

    public function delete($id = null)
    {
        $competitionModel = new CompetitionModel();
        $competitionModel->delete($id);

        return redirect()->to(base_url('admin/competitions'))->with('status', 'successes');
    }
}
