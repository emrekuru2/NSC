<?php

namespace App\Models;

use CodeIgniter\Model;

class competitionTypeModel extends Model
{
    protected $table            = 'nsca_competition_types';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name','description'];

    public function getAllClubs()
    {
        return $this->findAll();
    }
}
