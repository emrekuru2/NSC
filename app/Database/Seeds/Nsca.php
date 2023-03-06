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
        
        $devPrograms = [
            [
                'name' => 'Youth Summer Camp',
                'duration' => '16 Weeks',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'time' => '0915-1515',
                'charges' => '$50 monthly',
                'type' => 'youth',
                'daysRun' => 'Saturdays and Sundays',
            ],
            [
                'name' => 'Lunchtime Basketball',
                'duration' => '10 Weeks',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'time' => '1215-1515',
                'charges' => '$25 monthly',
                'type' => 'youth',
                'daysRun' => 'Saturdays and Sundays',
            ],
            [
                'name' => 'Youth Summer Camp',
                'duration' => '10 Weeks',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'time' => '1215-1515',
                'charges' => '$25 monthly',
                'type' => 'youth',
                'daysRun' => 'Saturdays and Sundays',
            ],

        ];
        $this->db->table('nsca_dev')->insertBatch($devPrograms);

    }
}
