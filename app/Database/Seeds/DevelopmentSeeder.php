<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    public function run()
    {
        $types = [
            [
                'name' => 'Kids',
                'min_age' => 5,
                'max_age' => 12,
            ],
            [
                'name' => 'Youth',
                'min_age' => 13,
                'max_age' => 18,
            ],
            [
                'name' => 'Adult',
                'min_age' => 19,
                'max_age' => 100,
            ],
        ];
        $this->db->table('nsca_dev_types')->insertBatch($types);

        $programs = [
            [
                'name' => 'Youth Summer Camp',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'typeID' => 1,
                'start_time' => '11:30 am',
                'end_time' => '11:50 am',
                'start_date' => '3-16-2023',
                'end_date' => '28-16-2023',
                'price' => 50,
                'location' => 'NSCA',
                'daysRun' => 'Saturdays and Sundays',

            ],
            [
                'name' => 'Youth lunch Camp',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'typeID' => 2,
                'start_time' => '11:30 am',
                'end_time' => '11:50 am',
                'start_date' => '3-16-2023',
                'end_date' => '28-16-2023',
                'price' => 50,
                'location' => 'NSCA',
                'daysRun' => 'Saturdays and Sundays',

            ],
            [
                'name' => 'Youth night Camp',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros odio, volutpat tempus ullamcorper ut, scelerisque quis neque. Nullam finibus orci id mi sagittis tincidunt. Vestibulum ornare ornare dui, et iaculis diam pulvinar vitae. Ut eu nunc ut velit elementum accumsan. Morbi nec pharetra dolor. Nunc porta suscipit lacus eget consequat. Phasellus a est vitae sapien dignissim egestas ut vulputate ipsum. Morbi sed ultricies dolor, sed mollis nibh. In semper, libero iaculis feugiat lobortis, enim metus',
                'typeID' => 3,
                'start_time' => '11:30 am',
                'end_time' => '11:50 am',
                'start_date' => '3-16-2023',
                'end_date' => '28-16-2023',
                'price' => 50,
                'location' => 'NSCA',
                'daysRun' => 'Saturdays and Sundays',

            ],
        ];
        $this->db->table('nsca_devs')->insertBatch($programs);

        $users = [
            [
                'devID' => 1,
                'userID' => 2
            ],
            [
                'devID' => 2,
                'userID' => 1
            ],
            [
                'devID' => 3,
                'userID' => 1
            ]
        ];
        $this->db->table('nsca_dev_users')->insertBatch($users);
    }
}
