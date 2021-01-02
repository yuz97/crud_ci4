<?= $this->extend('templates');  ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
      <div class="col-8">
        <h2><?php echo $title; ?></h2>
        <form method="post" action="<?= base_url('public/komik/update/'.$komik['id']); ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $komik['gambar']; ?>">
          <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label >
            <div class="col-sm-10">
              <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid':'' ?>" id="nama"  name="nama" autofocus value="<?= (old('nama'))? old('nama'):$komik['nama']; ?>">
              <div class="invalid-feedback">
                <?php echo $validation->getError('nama'); ?>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
            <div class="col-sm-10">
              <textarea name="keterangan" id="keterangan" cols="63" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('nama'))? old('nama'):$komik['penulis'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?=(old('nama'))? old('nama'):$komik['penerbit']; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="penerbit" class="col-sm-2 col-form-label">Gambar</label>
            <div class="sol-sm-2">
              <img src="<?= base_url('public/img/'.$komik['gambar']); ?>" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
              <div class="custom-file">
                <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')? 'is-invalid':'' )?>" id="gambar" name="gambar" onchange="preview()">
                  <div class="invalid-feedback">
                    <?php echo $validation->getError('gambar'); ?>
                 </div>
                <label for="gambar" class="custom-file-label "><?= $komik['gambar']; ?></label>
              </div>
            </div>
          </div>
          
          <a href="<?= base_url('public/komik'); ?>" class="btn btn-primary"><i class="fas fa-"></i> kembali</a>
          <button class="btn btn-success" type="submit"><i class="fas fa-user"></i> Update</button>
        </form>
      </div>
  </div>
</div>
<?= $this->endSection(); ?>