<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubModel extends Model
{
    protected $table            = 'nsca_clubs';
    protected $primaryKey       = 'ClubID';

    protected $returnType       = \App\Entities\Club::class;
    public function getAllClubs()
    {
        return $this->findAll();
    }
}
