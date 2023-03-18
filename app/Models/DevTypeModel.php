<?php

namespace App\Models;

use CodeIgniter\Model;

class DevTypeModel extends Model
{
    protected $table            = 'nsca_dev_types';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\DevType::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'min_age', 'max_age'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
