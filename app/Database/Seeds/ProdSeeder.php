<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdSeeder extends Seeder
{
    public function run()
    {
        $password = service('passwords');

        $users = [
            [
                'email'      => 'admin@gmail.com',
                'first_name' => 'Admin',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'country'    => 'Canada',
                'postal'     => 'B3H4R2',
                'active'     => 1,
            ],

        ];

        $this->db->table('nsca_users')->insertBatch($users);

        $auth_identities = [
            [
                'user_id'      => 1,
                'type'         => 'email_password',
                'name'         => null,
                'secret'       => 'admin@gmail.com',
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

        ];

        $this->db->table('auth_groups_users')->insertBatch($auth_groups);

        $auth_premissions = [
            [
                'user_id'    => 1,
                'permission' => 'admin',
            ],
        ];

        $this->db->table('auth_permissions_users')->insertBatch($auth_premissions);
    }
}
