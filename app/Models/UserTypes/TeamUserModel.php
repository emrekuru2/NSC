<?php

namespace App\Models\UserTypes;

use CodeIgniter\Model;

class TeamUserModel extends Model
{
    // Construction
    protected $table         = 'nsca_team_users';
    protected $primaryKey    = 'id';
    protected $returnType    = \App\Entities\UserTypes\TeamUser::class;
    protected $protectFields = true;
    protected $allowedFields = ['userID', 'teamID', 'isTeamCaptain', 'isViceCaptain'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Functions
    public function deleteTeamUsers(int $teamID)
    {
        $this->where('teamID', $teamID)->delete();
    }
}
