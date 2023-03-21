<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClubSeeder extends Seeder
{
    public function run()
    {
        $clubs = [
            [
                'name' => 'Halifax Cricket Club',
                'abbreviation' => 'HCC',
                'website' => NULL,
                'description' => NULL,
                'email' => 'halifaxcricketclub@gmail.com',
                'phone' => '403-702-1916',
                'facebook' => 'https://www.facebook.com/halifaxcricketclub/',
                'image' => 'assets/images/Clubs/default.png',
            ],
            [
                'name' => 'East Coast Cricket Club',
                'abbreviation' => 'ECCC',
                'website' => 'https://eastcoastcricketclub.ca/',
                'description' => NULL,
                'email' => 'eastcoastcricketclub@gmail.com',
                'phone' => '902-789-6335',
                'facebook' => 'https://www.facebook.com/cricketclubofeastcoast/',
                'image' => 'assets/images/Clubs/default.png',
            ],
            [
                'name' => 'Nova Scotia Avengers Cricket Club',
                'abbreviation' => 'Avengers',
                'website' => NULL,
                'description' => NULL,
                'email' => 'novascotiaavengers@gmail.com',
                'phone' => '709-699-8717',
                'facebook' => 'https://www.facebook.com/Nova-Scotia-Avengers-Cricket-Club-2214442235461792/',
                'image' => 'assets/images/Clubs/default.png',
            ],
            [
                'name' => 'Halifax Titans Cricket Club',
                'abbreviation' => 'Titans',
                'website' => 'https://halifaxtitanscricketclub.com/',
                'description' => NULL,
                'email' => 'halifaxtitanscricketclub@gmail.com',
                'phone' => '902-414-5502',
                'facebook' => NULL,
                'image' => 'assets/images/Clubs/default.png',
            ]
        ];
        $this->db->table('nsca_clubs')->insertBatch($clubs);

        $users = [
            [
                'userID' => 1,
                'clubID' => 1,
                'isManager' => 1
            ],
            [
                'userID' => 2,
                'clubID' => 1,
                'isManager' => 0
            ],
            [
                'userID' => 3,
                'clubID' => 2,
                'isManager' => 1
            ],
            [
                'userID' => 4,
                'clubID' => 2,
                'isManager' => 0
            ],
            [
                'userID' => 5,
                'clubID' => 3,
                'isManager' => 1
            ],
            [
                'userID' => 5,
                'clubID' => 3,
                'isManager' => 0
            ]
        ];
        $this->db->table('nsca_club_users')->insertBatch($users);

        $joinList = [
            [
                'userID' => 2,
                'clubID' => 1
            ],
            [
                'userID' => 3,
                'clubID' => 2
            ],
            [
                'userID' => 4,
                'clubID' => 3
            ]
        ];
        $this->db->table('nsca_club_joinlists')->insertBatch($joinList);
    }
}
