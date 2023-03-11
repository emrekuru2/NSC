<?php

namespace App\Models;

use CodeIgniter\Model;

class DevTypeModel extends Model
{
    protected $table            = 'nsca_devprogram_type';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\DevType::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['type_name', 'min_age', 'max_age'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
