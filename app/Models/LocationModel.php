<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{

    // Construction
    protected $table            = 'nsca_location';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Location::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'address', 'description'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

 
}
