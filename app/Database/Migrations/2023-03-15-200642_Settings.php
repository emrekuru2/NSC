<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Settings extends Migration
{
    public function up()
    {
        // Settings Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'class'      => ['type' => 'varchar', 'constraint' => 255],
            'key'        => ['type' => 'varchar', 'constraint' => 255],
            'value'      => ['type' => 'text', 'null' => true, 'default' => null],
            'type'       => ['type' => 'varchar', 'constraint' => 31, 'default' => 'string'],
            'context'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'default' => null],
            'created_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
            'updated_at' => ['type' => 'datetime', 'null' => false, 'default' => Time::now()],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('settings', true);

        $this->db->enableForeignKeyChecks();
    }
}
