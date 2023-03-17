<?php

namespace App\Models\UserTypes;

use CodeIgniter\Model;

class LocationUserModel extends Model
{
    // Construction
    protected $table            = 'nsca_location_users';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\UserTypes\LocationUser::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['locationID', 'userID'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

  

}
