<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Competition;
use App\Interfaces\CRUD;
use App\Models\CompetitionModel;
use App\Models\CompetitionTypeModel;

class CompetitionsController extends BaseController implements CRUD
{
    protected $compModel;
    protected $compTypeModel;
    protected $helpers = ['html', 'form', 'text'];

    public function __construct()
    {
        $this->compModel     = new CompetitionModel();
        $this->compTypeModel = new CompetitionTypeModel();
    }

    public function index()
    {
        $data = [
            'title'        => 'Competitions',
            'competitions' => $this->compModel->findAll(),
            'compTypes'    => $this->compTypeModel->findAll(),
        ];

        return view('pages/admin/competitions', $data);
    }

    public function read(string $param)
    {
        $data = [
            'title'        => 'Competitions',
            'competitions' => $this->compModel->findAll(),
            'compTypes'    => $this->compTypeModel->findAll(),
            'currentComp'  => $this->compModel->where('name', $param)->first(),
        ];

        return view('pages/admin/competitions', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        return ($this->compModel->update($id, $data))
            ? toast('success', lang('Admin.competition.update.success'))
            : toast('danger', lang('Admin.competition.update.error'));
    }

    public function create()
    {
        $data = $this->request->getPost();
        $competition = new Competition();
        $competition->fill($data);

        return ($this->compModel->save($competition))
            ? toast('success', lang('Admin.competition.create.succes'))
            : toast('danger',  lang('Admin.competition.create.error'));
    }

    public function delete(int $id)
    {
        return ($this->compModel->delete($id))
            ? toast('success', lang('Admin.competition.delete.success'))
            : toast('danger',  lang('Admin.competition.delete.error'));
    }
}
