<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Clubs extends Migration
{
    public function up()
    {
        // Clubs Table
        $this->forge->addField([
            'id'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'email'        => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'name'         => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'abbreviation' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'  => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'website'      => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'phone'        => ['type' => 'varchar', 'constraint' => 12, 'null' => true],
            'facebook'     => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'image'        => ['type' => 'varchar', 'constraint' => 64, 'null' => false, 'default' => 'assets/images/Clubs/default.png'],
            'created_at'   => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'   => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_clubs');

        // Club_Users Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'clubID'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isManager'  => ['type' => 'tinyint', 'constraint' => 1, 'null' => true, 'default' => 0],
            'created_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['clubID', 'userID']);
        $this->forge->addForeignKey('clubID', 'nsca_clubs', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_club_users');

        // Club Joinlist Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'clubID'     => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['clubID', 'userID']);
        $this->forge->addForeignKey('clubID', 'nsca_clubs', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_club_joinlists');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nsca_clubs', true);
        $this->forge->dropTable('nsca_club_users', true);
        $this->forge->dropTable('nsca_club_joinlists', true);

        $this->db->enableForeignKeyChecks();
    }
}
