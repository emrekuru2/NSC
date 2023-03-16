<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEmailModel extends Model
{
    // Construction
    protected $table            = 'nsca_users';
    protected $primaryKey       = 'id';
    protected $returnType       = \App\Entities\User::class;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'email',
        'first_name',
        'last_name'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Functions
    public function getClubMemberEmailsByID(int $clubID): array
    {
        return $this->select('nsca_users.email')
            ->join('nsca_club_user', 'nsca_users.id = nsca_club_user.userID', 'left')
            ->join('nsca_clubs', 'nsca_club_user.clubID = nsca_clubs.id', 'left')
            ->where('nsca_clubs.id', $clubID)->findAll();
    }

    public function getTeamMemberEmailsByID(int $teamID): array
    {
        return $this->select('nsca_users.email')
            ->join('nsca_team_user', 'nsca_users.id = nsca_team_user.userID', 'left')
            ->join('nsca_teams', 'nsca_team_user.teamID = nsca_teams.id', 'left')
            ->where('nsca_teams.id', $teamID)->findAll();
    }

    public function getLocationMemberEmailsByID(int $locationID): array
    {
        return $this->select('nsca_users.email')
            ->join('nsca_location_user', 'nsca_users.id = nsca_location_user.userID', 'left')
            ->join('nsca_location', 'nsca_location_user.locationID = nsca_location.id', 'left')
            ->where('nsca_location.id', $locationID)->findAll();
    }

    public function getDevProgramMemberEmailsByID(int $devID): array
    {
        return $this->select('nsca_users.email')
            ->join('nsca_dev_user', 'nsca_users.id = nsca_dev_user.userID', 'left')
            ->join('nsca_dev', 'nsca_dev_user.devID = nsca_dev.id', 'left')
            ->where('nsca_dev.id', $devID)->findAll();
    }

    public function getCommitteeMemberEmailsByID(int $committeeID): array
    {
        return $this->select('nsca_users.email')
            ->join('nsca_committees_user', 'nsca_users.id = nsca_committees_user.userID', 'left')
            ->join('nsca_committees', 'nsca_committees_user.committeeID = nsca_committees.id', 'left')
            ->where('nsca_committees.id', $committeeID)->findAll();
    }

    public function getAllUserEmails(): array
    {
        return $this->select('nsca_users.email')->findAll();
    }

    public function getAllClubMemberEmails(): array
    {
        return $this->select('nsca_users.email')
            ->join('nsca_club_user', 'nsca_users.id = nsca_club_user.userID', 'cross')->findAll();
    }

    public function getAllDevProgramMemberEmails(): array
    {
        return $this->select('nsca_users.email')
            ->join('nsca_dev_user', 'nsca_dev_user.userID = nsca_users.id', 'cross')->findAll();
    }

    public function getTeamUsersByTeamName(string $teamName): array
    {
        $db = \Config\Database::connect();

        $statement = "SELECT nsca_users.id, nsca_users.first_name, nsca_users.last_name FROM nsca_users
                        LEFT JOIN nsca_team_user ON nsca_users.id = nsca_team_user.userID
                        LEFT JOIN nsca_teams ON nsca_team_user.teamID = nsca_teams.id
                        WHERE nsca_teams.name = {$teamName}";

        $query = $db->query($statement);
        return $query->getResult();
    }

    public function getTeamUsersByTeamId(int $teamID): array
    {
        $db = \Config\Database::connect();

        $statement = "SELECT nsca_users.id FROM nsca_users
                        LEFT JOIN nsca_team_user ON nsca_users.id = nsca_team_user.userID
                        LEFT JOIN nsca_teams ON nsca_team_user.teamID = nsca_teams.id
                        WHERE nsca_teams.id = {$teamID}";

        $query = $db->query($statement);
        return $query->getResult();
    }

    public function getClubUsersByClubName(string $clubName): array
    {
        $db = \Config\Database::connect();

        $statement = "SELECT nsca_users.id, nsca_users.first_name, nsca_users.last_name FROM nsca_users
                        LEFT JOIN nsca_club_user ON nsca_users.id = nsca_club_user.userID
                        LEFT JOIN nsca_clubs ON nsca_club_user.teamID = nsca_clubs.id
                        WHERE nsca_clubs.name = {$clubName}";

        $query = $db->query($statement);
        return $query->getResult();
    }

    public function getClubUsersByClubId(string $clubID): array
    {
        $db = \Config\Database::connect();

        $statement = "SELECT nsca_users.id, nsca_users.first_name, nsca_users.last_name FROM nsca_users
                        LEFT JOIN nsca_club_user ON nsca_users.id = nsca_club_user.userID
                        LEFT JOIN nsca_clubs ON nsca_club_user.teamID = nsca_clubs.id
                        WHERE nsca_clubs.id = {$clubID}";

        $query = $db->query($statement);
        return $query->getResult();
    }

}
