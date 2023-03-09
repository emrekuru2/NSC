<?php

namespace App\Models\UserTypes;

use CodeIgniter\Model;

class ClubUserModel extends Model
{
    protected $table            = 'nsca_club_user';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\UserTypes\ClubUser::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['clubID', 'userID', 'isManager'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}
