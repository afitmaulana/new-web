<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWisata extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'nama'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'lokasi'     => ['type' => 'VARCHAR', 'constraint' => 150],
            'deskripsi'  => ['type' => 'TEXT', 'null' => true],
            'tiket'      => ['type' => 'INT', 'default' => 0],
            'gambar'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('wisata');
    }

    public function down()
    {
        $this->forge->dropTable('wisata');
    }
}
