<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container"> 
    <div class="row">
        <div class="col-lg">
            <h1 class="my-3">Daftar Buku</h1>
            <!-- <a href="" class="btn btn-outline-primary btn-sm">Tambah Data Buku</a> -->
            <?= $validation->listErrors(); ?>

            <!-- session Flashdata -->

            <?php if(session()->getFlashdata('notif')): ?>

                
                <div class="alert alert-info" role="alert">
                    <?= session()->getFlashdata('notif'); ?>
                </div>

            <?php endif; ?>

            <!-- end Flashdata -->
            
            <!-- Modal Tambah Data Buku -->
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Data Buku
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="/buku/save" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->geterror('judul'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                                </div>
                            </div>               
                            <div class="row mb-3">
                                <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                                </div>
                            </div>               
                            <div class="row mb-3">
                                <label for="cover" class="col-sm-2 col-form-label">Cover Buku</label>
                                <div class="col-sm-2">
                                    <img src="/img/missing.jpg" id="preview" class="img-thumbnail">
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
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    
                    </div>
                    </div>
                </div>
            </div>

        <!-- Tutup Modal Tambah Data Buku -->

        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Cover Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
                <?php foreach($buku as $b) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><img src="/img/<?= $b['cover']; ?>" alt="" class="cover"></td>
                        <td><?= $b['judul']; ?></td>
                        <td>
                            <a href="/buku/<?= $b['slug']; ?>" class="btn btn-primary">Detail Buku</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>