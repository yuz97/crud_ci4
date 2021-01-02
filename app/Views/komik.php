<?= $this->extend('templates'); ?>
<?= $this->section('content') ?>
	<div class="container">
		<div class="text-center my-2" style="font-size: 30px;"><b>Table Komik</b></div> 

		<?php if (session()->getFlashdata('pesan')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo session()->getFlashdata('pesan'); ?>
			</div>
		<?php endif; ?>
		<?php if(session()->getFlashdata('hapus')): ?>
			<div class="alert alert-danger" role="alert">
				<?php echo session()->getFlashdata('hapus'); ?>
			</div>
		<?php endif; ?>

		<a href="<?= base_url('public/komik/create'); ?>"class="btn btn-info" style="color: white"><i class="fas fa-plus"></i> Tambah Komik</a>
		<table class="table table-hovered table-striped mt-2">
			<tr class="text-center">
				<th>No</th>
				<th>Sampul</th>
				<th>Judul</th>
				<th colspan="2">Penulis</th>
			</tr>
		<?php $i =1;  ?>
		<?php foreach ($komik as $k) :?>
			<tr class="text-center">
				<td><?= $i++; ?></td>
				<td><img src="<?= base_url('public/img/'.$k['gambar']); ?>" height=70 width=50></td>
				<td><?= $k['nama']; ?></td>
				<td><?= $k['penulis']; ?></td>
				<td><a href="<?= base_url('public/komik/'.$k['slug']); ?>" class="btn btn-primary"> <i class="fas fa-search"></i> Detail</a></td>

			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?= $this->endSection(); ?>