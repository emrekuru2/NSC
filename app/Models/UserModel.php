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
}
