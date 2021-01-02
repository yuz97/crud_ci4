<?php namespace App\Controllers;

class Homes extends BaseController{

	public function index()
	{
		$data =[
			'title' =>'Daftar karyawan',
			'orang' =>[
				[
					'nama'		=>'yusuf',
					'alamat' 	=> 'jl.sitakka no.1',
					'kota'		=>'banjarmasin'

				],[
					'nama'		=>'benjamin',
					'alamat' 	=>'jl.budiman no.2',
					'kota'		=>'medan'
				]
			]
		];
		
		return view('homes',$data);
	}
	
	
 }
