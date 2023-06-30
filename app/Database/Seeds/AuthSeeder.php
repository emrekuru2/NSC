<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $password = service('passwords');

        $users = [
            [
                'first_name' => 'Admin',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'postal'     => 'B3H4R2',
                'active'     => 1,
            ],
            [
                'first_name' => 'Manager',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'postal'     => 'B3H4R2',
                'active'     => 1,
            ],
            [
                'first_name' => 'Player',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'postal'     => 'B3H4R2',
                'active'     => 1,
            ],
            [
                'first_name' => 'Umpire',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'postal'     => 'B3H4R2',
                'active'     => 1,
            ],
            [
                'first_name' => 'Guest',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'postal'     => 'B3H4R2',
                'active'     => 1,
            ],

        ];

        $this->db->table('nsca_users')->insertBatch($users);

        $auth_identities = [
            [
                'user_id'      => 1,
                'type'         => 'email_password',
                'secret'       => 'admin@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
            ],
            [
                'user_id'      => 2,
                'type'         => 'email_password',
                'secret'       => 'manager@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
            ],
            [
                'user_id'      => 3,
                'type'         => 'email_password',
                'secret'       => 'player@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
            ],
            [
                'user_id'      => 4,
                'type'         => 'email_password',
                'secret'       => 'umpire@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
            ],
            [
                'user_id'      => 5,
                'type'         => 'email_password',
                'secret'       => 'guest@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
            ],
        ];

        $this->db->table('auth_identities')->insertBatch($auth_identities);

        $auth_groups = [
            [
                'user_id' => 1,
                'group'   => 'admin',
            ],
            [
                'user_id' => 2,
                'group'   => 'manager',
            ],
            [
                'user_id' => 3,
                'group'   => 'player',
            ],
            [
                'user_id' => 4,
                'group'   => 'umpire',
            ],
            [
                'user_id' => 5,
                'group'   => 'guest',

            ],
        ];

        $this->db->table('auth_groups_users')->insertBatch($auth_groups);

        $auth_premissions = [
            [
                'user_id'    => 1,
                'permission' => 'admin',
            ],
            [
                'user_id'    => 2,
                'permission' => 'manager',

            ],
            [
                'user_id'    => 3,
                'permission' => 'player',

            ],
            [
                'user_id'    => 4,
                'permission' => 'umpire',

            ],
            [
                'user_id'    => 5,
                'permission' => 'guest',
            ],
        ];

        $this->db->table('auth_permissions_users')->insertBatch($auth_premissions);
    }
}
