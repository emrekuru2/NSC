<?php

namespace App\Controllers\Main;

use App\Controllers\BaseController;

class CommitteesController extends BaseController
{
    public function index()
    {
        $model = model(CommitteeModel::class);

        $data = [
            'committees' => $model->findAll(),
            'title'      => 'Committees',
        ];

        return view('pages/main/committees', $data);
    }
    
    public function view($id)

    {

        $model = model(CommitteeModel::class);

        $committee = $model->find($id);

        if ($committee === null) {

            // Committee not found, handle the error appropriately

            return $this->response->setStatusCode(404)->setJSON(['error' => 'Committee not found.']);

        }

        $members = $model->getMembers($id);

        $data = [

            'committee' => $committee,

            'members'   => $members,

            'title'     => 'Committee Details',

        ];

        return $this->response->setJSON($data);

    }
}
