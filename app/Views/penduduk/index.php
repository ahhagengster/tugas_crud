<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-5">
                <h1 class="my-3">Data Penduduk</h1>
                <form action="" method="POST">
                    <div class="input-group mb-3">
                            <input type="text"  class="form-controol"   name="cari" placeholder="Masukan keyword nama/alamat..." autofocus>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari data</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table></table>
            </div>
        </div>
    </div>


<?= $this->endSection(); ?>