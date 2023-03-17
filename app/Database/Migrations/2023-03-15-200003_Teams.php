<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Teams extends Migration
{
    public function up()
    {
         // Teams Table
         $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'clubID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'image'         => ['type' => 'varchar', 'constraint' => 128, 'null' => false, 'default' => 'assets/images/Teams/default.png'],
            'created_at'    => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'    => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('clubID');
        $this->forge->addForeignKey('clubID', 'nsca_clubs', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_teams');

        // Team User Table
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'teamID'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isTeamCaptain'   => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'isViceCaptain'   => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'      => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'      => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['userID', 'teamID']);
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('teamID', 'nsca_teams', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_team_users');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nsca_team_users', true);
        $this->forge->dropTable('nsca_teams', true);

        $this->db->enableForeignKeyChecks();
    }
}
