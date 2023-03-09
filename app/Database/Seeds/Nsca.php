<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class Nsca extends Seeder
{


    public function run()
    {
        $password = service('passwords');

        $dataUsers = [
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
            ],
            [
                'email'      => 'manager@gmail.com',
                'first_name' => 'Manager',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'country'    => 'Canada',
                'postal'     => 'B3H4R2',
                'active'     => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'email'      => 'player@gmail.com',
                'first_name' => 'Player',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'country'    => 'Canada',
                'postal'     => 'B3H4R2',
                'active'     => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'email'      => 'umpire@gmail.com',
                'first_name' => 'Umpire',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'country'    => 'Canada',
                'postal'     => 'B3H4R2',
                'active'     => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'email'      => 'guest@gmail.com',
                'first_name' => 'Guest',
                'last_name'  => 'User',
                'phone'      => '0000000000',
                'street'     => '6299 South st.',
                'city'       => 'Halifax',
                'country'    => 'Canada',
                'postal'     => 'B3H4R2',
                'active'     => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        $this->db->table('nsca_users')->insertBatch($dataUsers);

        $dataAuthIdentitites = [
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
            ],
            [
                'user_id'      => 2,
                'type'         => 'email_password',
                'name'         => null,
                'secret'       => 'manager@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now()
            ],
            [
                'user_id'      => 3,
                'type'         => 'email_password',
                'name'         => null,
                'secret'       => 'player@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now()
            ],
            [
                'user_id'      => 4,
                'type'         => 'email_password',
                'name'         => null,
                'secret'       => 'umpire@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now()
            ],
            [
                'user_id'      => 5,
                'type'         => 'email_password',
                'name'         => null,
                'secret'       => 'guest@gmail.com',
                'secret2'      => $password->hash('Password2023!'),
                'expires'      => null,
                'extra'        => null,
                'force_reset'  => 0,
                'last_used_at' => null,
                'created_at'   => Time::now(),
                'updated_at'   => Time::now()
            ],
        ];

        $this->db->table('auth_identities')->insertBatch($dataAuthIdentitites);

        $dataAuthGroups = [
            [
                'user_id'    => 1,
                'group'      => 'admin',
                'created_at' => Time::now(),
            ],
            [
                'user_id'    => 2,
                'group'      => 'manager',
                'created_at' => Time::now(),
            ],
            [
                'user_id'    => 3,
                'group'      => 'player',
                'created_at' => Time::now(),
            ],
            [
                'user_id'    => 4,
                'group'      => 'umpire',
                'created_at' => Time::now(),
            ],
            [
                'user_id'    => 5,
                'group'      => 'guest',
                'created_at' => Time::now(),
            ],

        ];

        $this->db->table('auth_groups_users')->insertBatch($dataAuthGroups);

        $dataNews = [
            [
                'userID' => '1',
                'title' => 'erat neque',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
                'created_at' => Time::now(),

            ],
            [
                'userID' => '1',
                'title' => 'Duis dignissim',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
                'created_at' => Time::now(),
            ],
            [
                'userID' => '1',
                'title' => 'aliquet libero.',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
                'created_at' => Time::now(),
            ],
            [
                'userID' => '1',
                'title' => 'mauris, rhoncus',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
                'created_at' => Time::now(),
            ],
            [
                'userID' => '1',
                'title' => 'consequat nec,',
                'content' => '<h4>This is an example news!&nbsp;</h4>
                <p><code>checking editor functions...</code></p>
                <p><img src="https://www.planetware.com/wpimages/2019/11/canada-in-pictures-beautiful-places-to-photograph-morraine-lake.jpg" alt="" width="242" height="161"></p>
                <p>&nbsp;</p>',
                'created_at' => Time::now(),
            ]
        ];


        $this->db->table('nsca_news')->insertBatch($dataNews);

        $dataComments = [
            [
                'newsID' => '3',
                'userID' => '4',
                'comment' => 'consequat enim diam vel arcu. Curabitur',
                'created_at' => Time::now(),
            ],
            [
                'newsID' => '2',
                'userID' => '5',
                'comment' => 'consectetuer euismod est arcu',
                'created_at' => Time::now(),
            ],
            [
                'newsID' => '5',
                'userID' => '3',
                'comment' => 'feugiat. Sed nec metus',
                'created_at' => Time::now(),
            ],
            [
                'newsID' => '1',
                'userID' => '4',
                'comment' => 'est. Nunc ullamcorper, velit',
                'created_at' => Time::now(),
            ],
            [
                'newsID' => '1',
                'userID' => '4',
                'comment' => 'vel pede blandit',
                'created_at' => Time::now(),
            ]
        ];

        $this->db->table('nsca_news_comments')->insertBatch($dataComments);
        

        $DevPrograms = [
            [
                'name' => 'Youth Summer Camp',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'start_time' => Time::now(),
                'end_time' => Time::now(),
                'start_date' => Time::now(),
                'end_date' => Time::now(),
                'price' => 50,
                'location' => 'NSCA',
                'daysRun' => 'Saturdays and Sundays',

            ],
            [
                'name' => 'Youth lunch Camp',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'start_time' => Time::now(),
                'end_time' => Time::now(),
                'start_date' => Time::now(),
                'end_date' => Time::now(),
                'price' => 50,
                'location' => 'NSCA',
                'daysRun' => 'Saturdays and Sundays',

            ],
            [
                'name' => 'Youth night Camp',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'start_time' => Time::now(),
                'end_time' => Time::now(),
                'start_date' => Time::now(),
                'end_date' => Time::now(),
                'price' => 50,
                'location' => 'NSCA',
                'daysRun' => 'Saturdays and Sundays',

            ],
        ];
        $this->db->table('nsca_dev')->insertBatch($DevPrograms);

        $testDataClubs = [
            [
                'id' => 1,
                'name' => 'Halifax Cricket Club',
                'abbreviation' => 'HCC',
                'website' => NULL,
                'description' => NULL,
                'email' => 'halifaxcricketclub@gmail.com',
                'phone' => '403-702-1916',
                'facebook' => 'https://www.facebook.com/halifaxcricketclub/',
                'image' => NULL,
            ],
            [
                'id' => 2,
                'name' => 'East Coast Cricket Club',
                'abbreviation' => 'ECCC',
                'website' => 'https://eastcoastcricketclub.ca/',
                'description' => NULL,
                'email' => 'eastcoastcricketclub@gmail.com',
                'phone' => '902-789-6335',
                'facebook' => 'https://www.facebook.com/cricketclubofeastcoast/',
                'image' => NULL,
            ],
            [
                'id' => 3,
                'name' => 'Nova Scotia Avengers Cricket Club',
                'abbreviation' => 'Avengers',
                'website' => NULL,
                'description' => NULL,
                'email' => 'novascotiaavengers@gmail.com',
                'phone' => '709-699-8717',
                'facebook' => 'https://www.facebook.com/Nova-Scotia-Avengers-Cricket-Club-2214442235461792/',
                'image' => NULL,
            ],

        ];
        $this->db->table('nsca_clubs')->insertBatch($testDataClubs);

        $devProgType = [
            [
                'id' => 1,
                'name' => 'Kids',
                'min_age' => 5,
                'max_age' => 12,
            ],
            [
                'id' => 2,
                'name' => 'Youth',
                'min_age' => 13,
                'max_age' => 18,
            ],
            [
                'id' => 3,
                'name' => 'Adult',
                'min_age' => 19,
                'max_age' => 100,
            ],
        ];
        $this->db->table('nsca_devprogram_type')->insertBatch($devProgType);

    }
}
