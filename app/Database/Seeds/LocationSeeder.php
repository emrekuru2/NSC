<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $locations = [
            [
                'name'        => 'Halifax',
                'address'     => '123 Test Street',
                'description' => 'Halifax region description.',
            ],
            [
                'name'        => 'Sackville',
                'address'     => '123 Test Street',
                'description' => 'Sackville region description.',
            ],
            [
                'name'        => 'Dartmouth',
                'address'     => '123 Test Street',
                'description' => 'Dartmouth region description.',
            ],
        ];
        $this->db->table('nsca_locations')->insertBatch($locations);

        $users = [
            [
                'locationID' => 1,
                'userID'     => 1,
            ],
            [
                'locationID' => 1,
                'userID'     => 2,
            ],
            [
                'locationID' => 1,
                'userID'     => 3,
            ],
            [
                'locationID' => 2,
                'userID'     => 1,
            ],
            [
                'locationID' => 2,
                'userID'     => 5,
            ],
            [
                'locationID' => 2,
                'userID'     => 4,
            ],
            [
                'locationID' => 3,
                'userID'     => 3,
            ],
            [
                'locationID' => 3,
                'userID'     => 1,
            ],
            [
                'locationID' => 3,
                'userID'     => 2,
            ],
        ];
        $this->db->table('nsca_location_users')->insertBatch($users);
    }
}
