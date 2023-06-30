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
}
