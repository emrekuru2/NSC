<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Entities\CompetitionType;

class Competition extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [];

    public function getType(): CompetitionType
    {
        $compType = model(CompetitionTypeModel::class)->find($this->typeID);

        return $compType;
    }
}
