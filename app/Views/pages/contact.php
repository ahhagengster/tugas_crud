<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach($alamat as $data) : ?>
                <table>
                    <tr>
                        <td><?= $data['type']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td><?= $data['kota']; ?></td>
                    </tr>
                </table>

            <?php endforeach;;  ?>
        </div>
    </div>
</div>
<?= $this->endSection('')?>