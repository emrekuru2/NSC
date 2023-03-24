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
        helper('image');
        
        $committieesModel = new \App\Models\CommitteeModel();
        $name = $this->request->getVar('name');
        $startyear = $this->request->getVar('startyear');

        if ($this->request->getVar('endyear') == null){
            $startyear = $startyear . ' - Present';
        }
        else{
            $startyear = $startyear . ' - ' . $this->request->getVar('endyear');
        }
        $image = $this->request->getFile('image');
        if ($image->isValid()){
            
            $filePath = storeImage('Committee', $image);
        }
        else{
            $filePath = 'assets/images/Committee/default.png';
        }
        $data = [
            'name' => $name,
            'years' => $startyear,
            'description' => $this->request->getVar('description'),
            'image' => $filePath,
        ];

        $committieesModel->insert($data);

        return redirect()->to('/admin/committees');
    }
}