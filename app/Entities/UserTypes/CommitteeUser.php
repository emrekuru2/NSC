<?php

namespace App\Entities\UserTypes;

use CodeIgniter\Entity\Entity;

class CommitteeUser extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];
}
