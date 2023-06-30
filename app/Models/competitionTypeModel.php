<?php

namespace App\Models;

use CodeIgniter\Model;

class competitionTypeModel extends Model
{
    protected $table         = 'nsca_competition_types';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'description'];

    public function getAllClubs()
    {
        return $this->findAll();
    }

    
    public function findCompetitions(int $id) {
        return $this->select('nsca_competitions.typeID')
                    ->join('nsca_competitions', 'nsca_competitions.typeID = nsca_competition_types.id', 'left')
                    ->where('nsca_competitions.typeID', $id)
                    ->findAll();
    }
}
