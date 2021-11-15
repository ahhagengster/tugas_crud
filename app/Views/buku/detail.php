<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="my-3">Detail Buku</h1>
            <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="/img/<?= $buku['cover']; ?>" class="img-fluid rounded-start" alt="cover buku">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $buku['judul']; ?></h5>
                        <p class="card-text"><?= $buku['penulis']; ?></p>
                        <p class="card-text"><small class="text-muted"><?= $buku['penerbit']; ?></small></p>

                        <a href="/buku/edit/<?= $buku['slug']; ?>" class="btn btn-warning">Edit</a>
                        <form action="/buku/<?= $buku['id']; ?>" method="POST" class="d-inline">

                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah data ini yakin dihapus?') ; ">Delete</button>

                        </form>
                        <br><br>
                        <a href="/buku" class="btn btn-outline-primary btn-sm">Kembali ke Daftar Buku</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>