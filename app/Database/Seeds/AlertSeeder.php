<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AlertSeeder extends Seeder
{
    public function run()
    {
        $alerts = [
            [
                'id'      => 1,
                'title'   => 'No Games today!',
                'content' => 'No games will be played today due to the weather!',
                'status'  => 0,
            ],
        ];
        $this->db->table('nsca_alerts')->insertBatch($alerts);
    }
}
