<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\CompetitionType;
use App\Models\CompetitionTypeModel;
use App\Interfaces\CRUD;

class CompetitionTypeController extends BaseController implements CRUD
{
    protected $compTypeModel;
    protected $helpers = ['html', 'form', 'text'];

    public function __construct()
    {
        $this->compTypeModel = new CompetitionTypeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Competition Types',
            'types' => $this->compTypeModel->findAll()
        ];

        return view('pages/admin/competitionTypes', $data);
    }

    public function read(string $param)
    {
        $data = [
            'title'       => 'Competition Types',
            'types'       => $this->compTypeModel->findAll(),
            'currentType' => $this->compTypeModel->where('name', $param)->first(),
        ];

        return view('pages/admin/competitionTypes', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        return ($this->compTypeModel->update($id, $data))
            ? toast('success', lang('Admin.competition_type.update.success'))
            : toast('danger', lang('Admin.competition_type.update.error'));
    }

    public function create()
    {
        $data = $this->request->getPost();
        $newType = new CompetitionType();
        $newType->fill($data);

        return ($this->compTypeModel->save($newType))
            ? toast('success', lang('Admin.competition_type.create.success'))
            : toast('danger',  lang('Admin.competition_type.create.error'));
    }

    public function delete(int $id)
    {
        $currentType = $this->compTypeModel->find($id);

        if (!empty($currentType->getCompetitions())) {
            return toast('danger', lang('Admin.competition_type.foreignKey'));
        }

        return ($this->compTypeModel->delete($id))
            ? toast('success', lang('Admin.competition_type.delete.success'))
            : toast('danger',  lang('Admin.competition_type.delete.error'));
    }
}
