<?php

namespace App\Models;

use CodeIgniter\Model;

class CompetitionTypeModel extends Model
{
    protected $table         = 'nsca_competition_types';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\CompetitionType::class;
    protected $protectFields = true;
    protected $allowedFields = ['name', 'description'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
