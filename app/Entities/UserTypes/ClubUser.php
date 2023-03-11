<?php

namespace App\Entities\UserTypes;

use CodeIgniter\Entity\Entity;

class ClubUser extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
