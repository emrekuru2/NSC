<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('AuthSeeder');          // Authentication Seeder
        $this->call('ClubSeeder');          // Clubs Seeder
        $this->call('TeamSeeder');          // Teams Seeder
        $this->call('LocationSeeder');      // Location Seeder
        $this->call('CommitteeSeeder');     // Committees Seeder
        $this->call('CompetitionSeeder');   // Committees Seeder
        $this->call('NewsSeeder');          // News Seeder
        $this->call('AlertSeeder');         // Alerts Seeder
        $this->call('DevelopmentSeeder');   // Developments Seeder
    }
}
