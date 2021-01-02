<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kumpulan Komik </title>
	<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css'); ?>">
</head>
<body>

<?= $this->renderSection('content'); ?>


<script src="<?= base_url('assets/jQuery.js'); ?>"></script>
<script src="<?= base_url('assets/popper.js'); ?>"></script>
<script src="<?= base_url('assets/bootstrap.js'); ?>"></script>
<script>

function preview(){

	const sampul 	  = document.querySelector('#gambar');
	const sampulLabel = document.querySelector('.custom-file-label');
	const imgPreview  = document.querySelector('.img-preview');

	sampulLabel.textContent = sampul.files[0].name;

	const fileSampul = new FileReader();
	fileSampul.readAsDataURL(sampul.files[0]);

	fileSampul.onload = function(e){
		imgPreview.src = e.target.result;
	}
}

</script>
</body>
</html>