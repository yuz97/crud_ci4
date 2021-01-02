<?php 
namespace App\Models;
use CodeIgniter\Model; 

class komikModel extends Model{
	protected $table 			= 'buku';
	protected $useTimestamps 	= true; 
	protected $allowedFields = ['nama','slug','keterangan','penulis','penerbit','gambar'];

	public function getKomik($slug = false)
	{
		if(!$slug){
			return $this->findAll();
		}
		return $this->where(['slug' => $slug])->first();
	}
}
