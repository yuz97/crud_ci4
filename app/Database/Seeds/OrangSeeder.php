<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Orangseeder extends Seeder
{
	public function run()
	{
		$data = [
			[ 
				'nama' 		 => 'budi',
				'alamat'  	 => 'maros',
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
			[ 
				'nama' 		 => 'rahman',
				'alamat' 	 => 'satanggi',
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			],
			[ 
				'nama' 		 => 'budi',
				'alamat' 	 => 'kanjitongan',
				'created_at' => Time::now(),
				'updated_at' => Time::now()
			]
		];
		// run 1 data dalam table
		// $this->db->table('orang')->insert($data);

		// run multi data dalam table
		$this->db->table('orang')->insertBatch($data);
	}
}
