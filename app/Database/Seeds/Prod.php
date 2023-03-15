<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class Prod extends Seeder
{

    public function run()
    {
        $password = service('passwords');

        $dataAdminUser = [
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
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];
        $this->db->table('nsca_users')->insertBatch($dataAdminUser);

        $dataAuthAdminIdentity = [
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
                'created_at'   => Time::now(),
                'updated_at'   => Time::now()
            ]
        ];
        $this->db->table('auth_identities')->insertBatch($dataAuthAdminIdentity);

        $dataAuthAdminGroup = [
            [
                'user_id'    => 1,
                'group'      => 'admin',
                'created_at' => Time::now(),
            ]
        ];
        $this->db->table('auth_groups_users')->insertBatch($dataAuthAdminGroup);
    }

}
