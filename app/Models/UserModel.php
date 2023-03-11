<?php

namespace App\Models;

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected $table            = 'nsca_users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'email',
        'first_name',
        'last_name',
        'phone',
        'street',
        'city',
        'country',
        'postal_code',
        'status',
        'status_message',
        'active',
        'last_active',
        'deleted_at',
    ];

    public function findByCredentials(array $credentials): ?User
    {
        // Email is stored in an identity so remove that here
        $email = $credentials['email'] ?? null;
        unset($credentials['email']);

        // any of the credentials used should be case-insensitive
        foreach ($credentials as $key => $value) {
            $this->where('LOWER(' . $this->db->protectIdentifiers("users.{$key}") . ')', strtolower($value));
        }

        if (!empty($email)) {
            $data = $this->select('nsca_users.*, auth_identities.secret as email, auth_identities.secret2 as password_hash')
                ->join('auth_identities', 'auth_identities.user_id = nsca_users.id')
                ->where('auth_identities.type', Session::ID_TYPE_EMAIL_PASSWORD)
                ->where('LOWER(' . $this->db->protectIdentifiers('auth_identities.secret') . ')', strtolower($email))
                ->asArray()
                ->first();

            if ($data === null) {
                return null;
            }

            $email = $data['email'];
            unset($data['email']);
            $password_hash = $data['password_hash'];
            unset($data['password_hash']);

            $user                = new User($data);
            $user->email         = $email;
            $user->password_hash = $password_hash;
            $user->syncOriginal();

            return $user;
        }

        return $this->first();
    }

    public function getClubMemberEmailsByID(int $clubID)
    {
        return $this->select('nsca_users.email')
            ->join('nsca_club_user', 'nsca_users.id = nsca_club_user.userID', 'left')
            ->join('nsca_clubs', 'nsca_club_user.clubID = nsca_clubs.id', 'left')
            ->where('nsca_clubs.id', $clubID);
    }

    public function getTeamMemberEmailsByID(int $teamID)
    {
        return $this->select('nsca_users.email')
            ->join('nsca_team_user', 'nsca_users.id = nsca_team_user.userID', 'left')
            ->join('nsca_teams', 'nsca_team_user.teamID = nsca_teams.id', 'left')
            ->where('nsca_teams.id', $teamID);
    }

    public function getLocationMemberEmailsByID(int $locationID)
    {
        return $this->select('nsca_users.email')
            ->join('nsca_location_user', 'nsca_users.id = nsca_location_user.userID', 'left')
            ->join('nsca_location', 'nsca_location_user.locationID = nsca_location.id', 'left')
            ->where('nsca_location.id', $locationID);
    }

    public function getDevProgramMemberEmailsByID(int $devID)
    {
        return $this->select('nsca_users.email')
            ->join('nsca_dev_user', 'nsca_users.id = nsca_dev_user.userID', 'left')
            ->join('nsca_dev', 'nsca_dev_user.devID = nsca_dev.id', 'left')
            ->where('nsca_dev.id', $devID);
    }

    public function getCommitteeMemberEmailsByID(int $committeeID)
    {
        return $this->select('nsca_users.email')
            ->join('nsca_committees_user', 'nsca_users.id = nsca_committees_user.userID', 'left')
            ->join('nsca_committees', 'nsca_committees_user.committeeID = nsca_committees.id', 'left')
            ->where('nsca_committees.id', $committeeID);
    }
}
