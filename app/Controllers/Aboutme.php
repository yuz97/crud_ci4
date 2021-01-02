<?php 

namespace App\Controllers;

class Aboutme extends BaseController{

	public function index()
	{
		echo view('pages/header');
		echo view('pages/sidebar');
		echo view('pages/footer');
	}
	
 }