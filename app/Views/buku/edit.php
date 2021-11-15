<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Data Buku</h2>
            <form action="/buku/update/<?= $buku['id']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
            <input type="hidden" name="coverLama" value="<?= $buku['cover']; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $buku['judul'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->geterror('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $buku['penulis'] ?>">
                    </div>
                </div>               
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit'] ?>">
                    </div>
                </div>               
                <div class="row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover Buku</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $buku['cover']; ?>" id="preview" class="img-thumbnail">
                            <!-- <img src="/img/default.jpg" class="img-thumbnail img-preview"> -->
                    </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="userfile" name="cover" onchange="tampilkanPreview(this,'preview')">
                                <div class="invalid-feedback">
                                    <?= $validation->geterror('cover'); ?>
                                </div>
                            </div>
                        </div>
                    </div>               
                <button type="submit" class="btn btn-outline-dark btn-sm">Ubah Data</button>
                <a href="/buku/<?= $buku['slug']; ?>" class="btn btn-outline-primary btn-sm">Kembali ke Detail Buku</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>