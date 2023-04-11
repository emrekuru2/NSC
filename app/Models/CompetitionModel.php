<?php

namespace App\Models;

use CodeIgniter\Model;

class CompetitionModel extends Model
{
    protected $table            = 'nsca_competitions';
    protected $primaryKey       = 'id';
    protected $foreignkey       = "typeID";
    protected $returnType       = \App\Entities\Competition::class;
    protected $allowedFields    = ['typeID', 'name','description','yearRunning'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
