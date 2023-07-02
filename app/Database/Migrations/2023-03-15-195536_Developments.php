<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Developments extends Migration
{
    public function up()
    {
        // Development_Types Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'       => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'desc'       => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'min_age'    => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'max_age'    => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'created_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_dev_types');

        // Developments Table
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'typeID'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'name'        => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'start_time'  => ['type' => 'time', 'null' => false],
            'end_time'    => ['type' => 'time', 'null' => false],
            'start_date'  => ['type' => 'date', 'null' => false],
            'end_date'    => ['type' => 'date', 'null' => false],
            'price'       => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'location'    => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'image'       => ['type' => 'varchar', 'constraint' => 120, 'null' => false, 'default' => 'assets/images/Dev/default.png'],
            'daysRun'     => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'created_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'  => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('typeID');
        $this->forge->addForeignKey('typeID', 'nsca_dev_types', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_devs');

        // Development_Users Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'devID'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isLead'     => ['type' => 'tinyint', 'constraint' => 1, 'null' => true, 'default' => 0],
            'created_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['devID', 'userID']);
        $this->forge->addForeignKey('devID', 'nsca_devs', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_dev_users');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nsca_dev_types', true);
        $this->forge->dropTable('nsca_devs', true);
        $this->forge->dropTable('nsca_dev_users', true);

        $this->db->enableForeignKeyChecks();
    }
}
