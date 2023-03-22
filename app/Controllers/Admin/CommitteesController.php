<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CommitteesController extends BaseController
{
    public function index()
    {
        $committieesModel = new \App\Models\CommitteeModel();

        $data = [
            'committiees' => $committieesModel->findAll(),
            'title' => 'Committees'
        ];
        
        
        return view('pages/admin/committees', $data);
    }

    public function createCommittee(){
        $committieesModel = new \App\Models\CommitteeModel();
        $name = $this->request->getVar('name');
        $startyear = $this->request->getVar('startyear');
        if ($this->request->getVar('endyear') == null){
            $startyear = $startyear . ' - Present';
        }
        else{
            $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
        }
        $data = [
            'name' => $name,
            'years' => $startyear,
            'description' => $this->request->getVar('description'),
        ];

        $committieesModel->insert($data);

        return redirect()->to('/admin/committees');
    }
}