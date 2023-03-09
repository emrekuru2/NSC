<?php

namespace App\Models;

use CodeIgniter\Model;

class DevModel extends Model
{
    // Construction
    protected $table            = 'nsca_dev';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Dev::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'duration', 'description', 'time', 'charges', 'type', 'daysRun', 'image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}