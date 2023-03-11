<?php

namespace App\Models;

use CodeIgniter\Model;

class CompetitionModel extends Model
{
    // Construction
    protected $table            = 'nsca_competition';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Competition::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'compTypeID', 'yearRunning'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
