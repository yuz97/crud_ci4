<?php 
namespace App\Controllers;
use App\Models\komikModel;

class Komik extends Basecontroller{

	public function __construct(){
		$this->komikModel = new komikModel();
	}

	public function index()
	{
		// $komikModel = new komikModel();
		$komik = $this->komikModel->getKomik();
		// dd($komik);
		$data = [
			'komik' => $komik
		];
		return view('komik',$data);
	}

	public function detail($slug){
		$komik = $this->komikModel->getKomik($slug);
		// dd($komik);
		$data = [
			'title' => 'Detail Komik',
			'komik' => $komik
		];

		if(empty($data['komik'])){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik '.$slug.' tidak ditemukan');
		}
		return view('detail',$data);
	}

	public function create(){
		session();
		$data = [
			'title' 	 => 'form tambah data komik',
			'validation' => \Config\Services::validation()
		];
		return view('create',$data);
	}

	public function save(){
		// dd($this->request->getVar());

		// validasi input 
		if(!$this->validate([
			'nama' => [
				'rules'  => 'required|is_unique[buku.nama]',
				'errors' => [
					'required'  => '{field} komik harus diisi',
					'is_unique' => '{field} komik sudah ada'
				]
			],
			'gambar' =>[
				'rules'  => 'max_size[gambar,2024]|is_image[gambar]',
				// |mime_in[gambar,img/jpg,img/jpeg,img/png]
				// 'uploaded[gambar]
				'errors' =>[
					// 'uploaded' => 'Pilih gambar terlebih dahulu',
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar'
					// 'mime_in'  => 'Yang anda pilih bukan gambar'
				]
			]
		])){
			return redirect()->to('/ci4/public/komik/create')->withInput();
		}

		$fileGambar = $this->request->getFile('gambar');

		if($fileGambar->getError() == 4){
			$namaSampul = 'default.jpg';
		}else{
		// pindahkan file ke folder img
		$fileGambar->move('img');

		// ambik nama file sampul
		$namaSampul = $fileGambar->getName();
		}


		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->komikModel->save([
			'nama' 		 => $this->request->getVar('nama'),
			'slug'		 => $slug,
			'keterangan' => $this->request->getVar('keterangan'),
			'penulis' 	 => $this->request->getVar('penulis'),
			'penerbit' 	 => $this->request->getVar('penerbit'),
			'gambar' 	 => $namaSampul
		]);

		session()->setFlashdata('pesan','data berhasil ditambahkan');
		return redirect()->to('/ci4/public/komik');
		
	}

	public function delete($id)
	{
		// cari gambar berdasarkan id 
		$komik = $this->komikModel->find($id);

		// cek gambar default 
		if($komik['gambar'] != 'default.jpg'){
			
		// hapus gambar
		unlink('img/'.$komik['gambar']);

		}


		$this->komikModel->delete($id);
		session()->setFlashdata('hapus','data berhasil dihapus');
		return redirect()->to('/ci4/public/komik');
	}

	public function edit($slug)
	{
		$slug = $this->komikModel->getKomik($slug);
		$data = [
			'title' 		 => 'form edit data komik',
			'validation' 	 => \Config\Services::validation(),
			'komik' 		 => $slug
		];

		return view('edit',$data);
	}

	public function update($id)
	{
		$nama 		= $this->request->getVar('nama'); 
		$slug 		= $this->request->getVar('slug'); 
		$komikLama  = $this->komikModel->getKomik($slug);

		if ($komikLama['nama'] == $nama ){
			$rule_judul = 'required';
		}else{
			$rule_judul = 'required|is_unique[buku.nama]';
		}

		if(!$this->validate([

			'nama' => [

				'rules'  => $rule_judul,
				'errors' => [
					'required'  => '{field} komik harus diisi',
					'is_unique' => '{field} komik sudah terdaftar'
				]
			],

			'gambar' => [

				'rules'  => 'max_size[gambar,2024]|is_image[gambar]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'Yang anda pilih bukan gambar'

				]
			]

		])){
			return redirect()->to('ci4/public/komik/edit/'.$this->request->getVar('slug'))->withInput();
		}
		$fileSampul = $this->request->getFile('gambar');
		if ($fileSampul->getError()==4) {
			$namaSampul = $this->request->getVar('gambarLama');
		}else {
			// generate nama file random
			$namaSampul = $fileSampul->getRandomName();
			// pindahkan gambar

			$fileSampul->move('img',$namaSampul);

			// hapus file lama 

			// unlink('public/img/'.$this->request->getVar('gambarLama'));
		}
		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->komikModel->save([
			'id' 		=> $id,
			'nama' 		=> $this->request->getVar('nama'),
			'slug' 		=> $slug,
			'penulis' 	=> $this->request->getVar('penulis'),
			'penerbit'  => $this->request->getVar('penerbit'),
			'gambar'	=> $namaSampul

		]);

		session()->setFlashdata('pesan','data berhasil diubah');
		return redirect()->to('/ci4/public/komik');
	}
}

 