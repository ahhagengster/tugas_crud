<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container"> 
    <div class="row">
        <div class="col-lg">
            <h1 class="my-3">Daftar Member</h1>

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
            <?php $no = 1; ?>
                <?php foreach($member as $b) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $b['nama']; ?></td>
        
                        <td><?= $b['alamat']; ?></td>
                        <td>
                            <a href="" class="btn btn-danger">Detail Member</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?= $pager->links('memberdata', 'member_page')  ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>