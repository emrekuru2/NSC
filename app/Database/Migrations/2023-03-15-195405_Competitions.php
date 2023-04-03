<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Competitions extends Migration
{
    public function up()
    {
        // Competition_Types Table
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'created_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_competition_types');

        // Competition Table
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'typeID'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'name'        => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'yearRunning' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'created_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('typeID');
        $this->forge->addForeignKey('typeID', 'nsca_competition_types', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_competitions');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nsca_competition', true);
        $this->forge->dropTable('nsca_competition_types', true);

        $this->db->enableForeignKeyChecks();
    }
}
