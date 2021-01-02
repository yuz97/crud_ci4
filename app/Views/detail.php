<?=  $this->extend('templates'); ?>
<?=  $this->section('content') ?>
<div class="container">
	<div class="row">
		<div class="col">
			<h2 class="text-center"><?php echo($title); ?></h2>
	<div class="row">
		<div class="col">
			<div class="card mb-3" style="max-width: 540px">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="<?= base_url('public/img/'.$komik['gambar']); ?>" title="<?php echo $komik['gambar']; ?>" class="card-img" height="340">

					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><?php echo $komik['nama']; ?></h5>
							<p class="card-text"><?= $komik['keterangan'] ?></p>
							<p class="card-text"><small class="text-muted">Penulis : <?php echo $komik['penulis'] ?></small></p>
							<p class="card-text"><small class="text-muted">Penerbit : <?php echo $komik['penerbit'] ?></small></p>
							<p class="card-text"><small class="text-muted">dibuat : <?php echo $komik['updated_at'] ?></small></p>
							<form action="<?= base_url('public/komik/'.$komik['id']); ?>" method="post" class="d-inline">
								<?php echo csrf_field(); ?>
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
							</form>
						
							<a href="<?= base_url('public/komik/edit/'.$komik['slug']); ?>" class="btn btn-warning" ><i class="fas fa-edit"></i>Edit</a><br>

							<a href="<?= base_url('public/komik') ?>">kembali ke Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		</div>
	</div>
	
<?=  $this->endSection(); ?>