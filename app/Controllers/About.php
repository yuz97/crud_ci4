<?php namespace App\Controllers;

class About extends BaseController{

	public function index()
	{
		echo "ini adalah halaman about";
	}
	public function nama($nama,$umur){
		echo "nama saya adalah $nama dan saya berusia $umur tahun";
	}
	
 }
