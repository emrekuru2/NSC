<?php

namespace App\Models\UserTypes;

use CodeIgniter\Model;

class CommitteeUserModel extends Model
{
    // Construction
    protected $table            = 'nsca_committees_user';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\UserTypes\CommitteeUser::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['committeeID', 'userID', 'isLead'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
