<?php

namespace App\Models;

use CodeIgniter\Model;

class CommitteeModel extends Model
{
    // Construction
    protected $table            = 'nsca_committees';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Committee::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'years', 'image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

}
