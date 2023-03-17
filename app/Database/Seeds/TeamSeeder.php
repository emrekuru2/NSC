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
                'image' => 'NovaScotiaWarriors.jpg'
            ],
            [
                'clubID' => 2,
                'name' => 'Falcons',
                'description' => 'Falcons of Dartmouth',
                'image' => 'predators.jpg'
            ],
            [
                'clubID' => 3,
                'name' => 'Tigers',
                'description' => 'Tigers of Bedford',
                'image' => 'NSAvengers.jpg'
            ]
        ];
        $this->db->table('nsca_teams')->insertBatch($teams);

        $users = [
            [
                'userID' => 2,
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
                'userID' => 4,
                'teamID' => 2,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 5,
                'teamID' => 2,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 1,
                'teamID' => 3,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ],
            [
                'userID' => 5,
                'teamID' => 3,
                'isTeamCaptain' => 0,
                'isViceCaptain' => 0
            ]
        ];
        $this->db->table('nsca_team_users')->insertBatch($users);

        $joinList = [
            [
                'userID' => 2,
                'teamID' => 1
            ],
            [
                'userID' => 3,
                'teamID' => 2
            ],
            [
                'userID' => 4,
                'teamID' => 3
            ]
        ];
        $this->db->table('nsca_team_joinlists')->insertBatch($joinList);
    }
}
