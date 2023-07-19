<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\CompetitionModel;

class CompetitionType extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getCompetitions(): array
    {
        $competitions = model(CompetitionModel::class)->where('typeID', $this->id)->findAll();
        
        return $competitions;

    }
}
