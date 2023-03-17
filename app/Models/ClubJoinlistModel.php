<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubJoinlistModel extends Model
{
    protected $table            = 'nsca_club_joinlists';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\UserTypes\ClubUser::class;
    protected $protectFields    = true;
    protected $allowedFields    = ['clubID', 'userID'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
