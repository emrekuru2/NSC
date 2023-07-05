<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClubSeeder extends Seeder
{
    public function run()
    {
        $clubs = [
            [
                'name'         => 'Halifax Cricket Club',
                'abbreviation' => 'HCC',
                'website'      => null,
                'description'  => null,
                'email'        => 'halifaxcricketclub@gmail.com',
                'phone'        => '403-702-1916',
                'facebook'     => 'https://www.facebook.com/halifaxcricketclub/',
                'image'        => 'assets/images/Clubs/default.png',
            ],
            [
                'name'         => 'East Coast Cricket Club',
                'abbreviation' => 'ECCC',
                'website'      => 'https://eastcoastcricketclub.ca/',
                'description'  => null,
                'email'        => 'eastcoastcricketclub@gmail.com',
                'phone'        => '902-789-6335',
                'facebook'     => 'https://www.facebook.com/cricketclubofeastcoast/',
                'image'        => 'assets/images/Clubs/default.png',
            ],
            [
                'name'         => 'Nova Scotia Avengers Cricket Club',
                'abbreviation' => 'Avengers',
                'website'      => null,
                'description'  => null,
                'email'        => 'novascotiaavengers@gmail.com',
                'phone'        => '709-699-8717',
                'facebook'     => 'https://www.facebook.com/Nova-Scotia-Avengers-Cricket-Club-2214442235461792/',
                'image'        => 'assets/images/Clubs/default.png',
            ],
            [
                'name'         => 'Halifax Titans Cricket Club',
                'abbreviation' => 'Titans',
                'website'      => 'https://halifaxtitanscricketclub.com/',
                'description'  => null,
                'email'        => 'halifaxtitanscricketclub@gmail.com',
                'phone'        => '902-414-5502',
                'facebook'     => null,
                'image'        => 'assets/images/Clubs/default.png',
            ],
        ];
        $this->db->table('nsca_clubs')->insertBatch($clubs);

        $users = [
            [
                'userID'    => 1,
                'clubID'    => 1,
                'isManager' => 1,
            ],
            [
                'userID'    => 2,
                'clubID'    => 1,
                'isManager' => 0,
            ],
            [
                'userID'    => 3,
                'clubID'    => 2,
                'isManager' => 1,
            ],
            [
                'userID'    => 4,
                'clubID'    => 2,
                'isManager' => 0,
            ],
            [
                'userID'    => 5,
                'clubID'    => 3,
                'isManager' => 1,
            ],
        ];
        $this->db->table('nsca_club_users')->insertBatch($users);

        $joinList = [
            [
                'userID' => 2,
                'clubID' => 1,
            ],
            [
                'userID' => 3,
                'clubID' => 2,
            ],
            [
                'userID' => 4,
                'clubID' => 3,
            ],
        ];
        $this->db->table('nsca_club_joinlists')->insertBatch($joinList);
    }
}
