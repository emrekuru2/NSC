<?php

namespace App\Entities\UserTypes;

use CodeIgniter\Entity\Entity;
use App\Entities\User;
class CommitteeUser extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];


    public function getFullName() 
    {
        $user = model(UserModel::class)->find($this->userID);
        return $user->getFullName();

    }
}

