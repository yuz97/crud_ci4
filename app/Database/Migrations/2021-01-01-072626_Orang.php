<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orang extends Migration
{
	public function up()
	{
		// insert data to database
		$this->forge->addField([
			'id'   =>[
				'type'   		  => 'INT',
				 'constraint'     => '5',
				 'unsigned'    	  => TRUE,
				 'auto_increment' => TRUE
			],
			'nama' =>[
				'type'			=> 'VARCHAR',
				'constraint'	=> '225',
			],
			'alamat' =>[
				'type'			=> 'VARCHAR',
				'constraint'	=> '225',
			],
			'created_at' =>[
				'type' 			=> 'DATETIME',
				'null' 			=> TRUE
			],
			'updated_at' =>[
				'type' 			=> 'DATETIME',
				'null' 			=> TRUE
			]

		]);
		$this->forge->addKey('id',true);
		$this->forge->createTable('orang');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//delete data from database
		$this->forge->dropTable('orang');
	}
}
