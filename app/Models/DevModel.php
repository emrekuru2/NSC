<?php

namespace App\Models;

use CodeIgniter\Model;

class DevModel extends Model
{
    protected $table            = 'nsca_dev';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Dev::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'start_time', 'end_time', 'start_date', 'end_date', 'price', 'location', 'image', 'daysRun'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}