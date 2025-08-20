<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAttendanceRecords extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'official_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'attendance_date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'check_in' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'check_out' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('official_id', 'officials', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('attendance_records');
    }

    public function down()
    {
        $this->forge->dropTable('attendance_records');
    }
}
