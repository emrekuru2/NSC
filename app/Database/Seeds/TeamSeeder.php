<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            [
                'clubID' => 1,
                'name' => 'Lions',
                'description' => 'Lions of Halifax',
                'image' => 'assets/images/Teams/1679279078_96d548d55d41e3a40fd2.png'
            ],
            [
                'clubID' => 2,
                'name' => 'Falcons',
                'description' => 'Falcons of Dartmouth',
                'image' => 'assets/images/Teams/1679280630_ec7e6a5e7c77c3c6d728.png'
            ],
            [
                'clubID' => 3,
                'name' => 'Tigers',
                'description' => 'Tigers of Bedford',
                'image' => 'assets/images/Teams/1679280642_764ecea8c4444d1f0a0e.png'
            ]
        ];
        $this->db->table('nsca_teams')->insertBatch($teams);

        $users = [
            [
                'userID' => 1,
                'teamID' => 1,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 2,
                'teamID' => 1,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 3,
                'teamID' => 2,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 4,
                'teamID' => 2,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 5,
                'teamID' => 3,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 6,
                'teamID' => 3,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ]
        ];
        $this->db->table('nsca_team_users')->insertBatch($users);

        
    }
}
