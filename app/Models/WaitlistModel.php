<?php

namespace App\Models;

use CodeIgniter\Model;

class WaitlistModel extends Model
{
    // Construction
    protected $table         = 'nsca_club_joinlists';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['userID', 'clubID'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Functions

    public function getList()
    {
        return $this->select('nsca_users.first_name, nsca_users.last_name, nsca_users.id AS userID, nsca_club_joinlists.clubID AS clubID,  nsca_clubs.name AS club_name, nsca_club_joinlists.id AS recordID')
            ->join('nsca_users', 'nsca_club_joinlists.userID = nsca_users.id', 'left')
            ->join('nsca_clubs', 'nsca_club_joinlists.clubID = nsca_clubs.id', 'left')
            ->findAll();
    }
}
