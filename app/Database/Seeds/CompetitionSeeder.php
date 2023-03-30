<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    public function run()
    {
        $types = [
            [
                'name'        => 'Test Competition Type A',
                'description' => 'Test Competition Type A description.',
            ],
            [
                'name'        => 'Test Competition Type B',
                'description' => 'Test Competition Type B description.',
            ],
        ];
        $this->db->table('nsca_competition_types')->insertBatch($types);

        $competitions = [
            [
                'name'        => 'Lions Against Snakes',
                'typeID'      => 1,
                'description' => 'Lions and Snakes face head on.',
                'yearRunning' => 2022,
            ],
        ];
        $this->db->table('nsca_competitions')->insertBatch($competitions);
    }
}
