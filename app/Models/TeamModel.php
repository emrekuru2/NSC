<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table            = 'nsca_teams';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\Team::class;
    protected $allowedFields    = ['id', 'clubID', 'name', 'description', 'image'];

    // Functions
    public function getTeamsInClub(int $clubID): array
    {
        return $this->select('nsca_teams.id, nsca_teams.name')
            ->where('nsca_teams.clubID', $clubID)
            ->orderBy('nsca_teams.name', 'ASC')
            ->findAll();
    }

    public function getUnassignedTeams(): array
    {
        return $this->select('nsca_teams.id, nsca_teams.name')
            ->where('nsca_teams.clubID')
            ->orderBy('nsca_teams.name', 'ASC')
            ->findAll();
    }
}
