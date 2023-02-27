<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubModel extends Model
{
    protected $table            = 'nsca_clubs';
    protected $primaryKey       = 'ClubID';

    public function getAllClubs()
    {
        return $this->findAll();
    }
}
