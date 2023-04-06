<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Alerts extends Migration
{
    public function up()
    {
        // Alerts Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'content'    => ['type' => 'text'],
            'status'     => ['type' => 'tinyint', 'constraint' => 1, 'null' => false, 'default' => 0],
            'created_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_alerts');
    }

    public function down()
    {
        $this->forge->dropTable('nsca_alerts', true);
    }
}
