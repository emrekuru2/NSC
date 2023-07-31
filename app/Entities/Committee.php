<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\UserTypes\CommitteeUserModel;

class Committee extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];

    public function getMembers() {
        $members = model(CommitteeUserModel::class)->where('committeeID', $this->id)->findAll();
        return $members;
    }

}

