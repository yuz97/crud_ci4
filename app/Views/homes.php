<?= $this->extend('templates'); ?>

<?= $this->section('content'); ?>
	<div class="container">
		<h4><?= $title; ?></h4>
		<?php foreach ($orang as $row):?>
			<ul>
				<li>nama : <?= $row['nama'] ?></li>
				<li>alamat :<?= $row['alamat'] ?></li>
				<li>kota :<?= $row['kota'] ?></li>
				
			</ul>
		<?php endforeach; ?>

	</div>
<?= $this->endSection(); ?>