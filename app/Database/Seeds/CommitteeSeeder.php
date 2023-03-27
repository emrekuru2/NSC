<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    public function run()
    {
        $committies = [
            [
                'name' => 'Test Committee 1',
                'description' => 'Test description.',
                'years' => '2023 - 2025',
                'image' => 'assets/images/Committee/default.png'
            ],
            [
                'name' => 'Test Committee 2',
                'description' => 'Test description.',
                'years' => '2022 - 2024',
                'image' => 'assets/images/Committee/default.png'
            ]
        ];
        $this->db->table('nsca_committees')->insertBatch($committies);

        $users = [
            [
                'committeeID'   => 1,
                'userID'        => 1
            ],
            [
                'committeeID'   => 1,
                'userID'        => 2
            ],
            [
                'committeeID'   => 2,
                'userID'        => 4
            ]
        ];
        $this->db->table('nsca_committee_users')->insertBatch($users);
    }
}
