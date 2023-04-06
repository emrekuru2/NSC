<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Locations extends Migration
{
    public function up()
    {
        // Location Table
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'address'     => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description' => ['type' => 'varchar', 'constraint' => 512, 'null' => 0, 'default' => 0],
            'created_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_locations');

        // Location User Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'locationID' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['locationID', 'userID']);
        $this->forge->addForeignKey('locationID', 'nsca_locations', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_location_users');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nsca_locations', true);
        $this->forge->dropTable('nsca_location_users', true);

        $this->db->enableForeignKeyChecks();
    }
}
