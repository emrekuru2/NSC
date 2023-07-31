<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;
use App\Models\UserModel;

class TeamModel extends Model
{
    protected $table = 'nsca_teams';
    protected $primaryKey = 'id';
    protected $returnType = \App\Entities\Team::class;
    protected $allowedFields = ['id', 'clubID', 'name', 'description', 'image'];

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

    public function getPlayersByTeamID(int $teamID): array
    {
        $userModel = new UserModel();
        $players = $userModel
            ->select('nsca_users.*')
            ->join('nsca_team_users', 'nsca_users.id = nsca_team_users.userID', 'left')
            ->where('nsca_team_users.TeamID', $teamID)
            ->findAll();

        return $players;
    }

    public function getTeamsByClubID(int $id): array
    {
        return $this->where('clubID', $id)->orderBy($this->primaryKey)->findAll();
    }
}