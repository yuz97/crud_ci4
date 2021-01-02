<?php namespace App\Controllers;

class Contact extends BaseController
{
	public function index()
	{
		$data = [
			'title'=>'contact | web'
		];
		echo view('pages/header',$data);
		echo view('contact');
		echo view('pages/footer');
	}

	
}
