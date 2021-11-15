<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container"> 
    <div class="row mt-4">
        <div class="col-sm-8"><h3>Data Member</h3></div>
        <div class="col-sm-4">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukkan Keyword nama/alamat">
                    <button class="btn btn-outline-secondary" type="submit">Cari...</button>
                    <?php if($isSearch) :?>
                    <a href="<?= base_url() ?>/member" class="btn btn-outline-warning">Refresh Pencarian</a>
                    <?php endif;  ?>
                </div>      
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
        <table class="table table-borderless">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if($member) :?>
            <?php $no = 1 + (5 * ($currentPage - 1) ); ?>
                <?php foreach($member as $b) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $b['nama']; ?></td>
        
                        <td><?= $b['alamat']; ?></td>
                        <td>
                            <a href="" class="btn btn-primary">Detail Member</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="4">
                        <div class="alert alert-danger" role="alert">
                            Data Tidak ditemukan
                        </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
            </table>
            <?= $pager->links('memberdata', 'member_page')  ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>