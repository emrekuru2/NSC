<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Committees extends Migration
{
    public function up()
    {
        // Committees Table
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'years'       => ['type' => 'varchar', 'constraint' => 32, 'null' => false],
            'image'       => ['type' => 'varchar', 'constraint' => 120, 'null' => false, 'default' => 'assets/images/Commitee/default.png'],
            'created_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_committees');

        // Committees User Table
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'committeeID' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isLead'      => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['committeeID', 'userID']);
        $this->forge->addForeignKey('committeeID', 'nsca_committees', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_committee_users');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nsca_committees', true);
        $this->forge->dropTable('nsca_committee_users', true);

        $this->db->enableForeignKeyChecks();
    }
}
