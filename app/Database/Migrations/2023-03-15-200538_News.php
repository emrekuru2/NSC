<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class News extends Migration
{
    public function up()
    {
        // News Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'title'         => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'content'       => ['type' => 'text'],
            'created_at'    => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'    => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('userID');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_news');

        // News Comments Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'newsID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'comment'       => ['type' => 'text', 'null' => false],
            'created_at'    => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at'    => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['newsID', 'userID']);
        $this->forge->addForeignKey('newsID', 'nsca_news', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_news_comments');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nsca_news', true);
        $this->forge->dropTable('nsca_news_comments', true);      

        $this->db->enableForeignKeyChecks();
    }
}
