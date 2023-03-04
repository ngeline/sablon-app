<?= $this->extend('admin/layouts/index'); ?>

<?= $this->section('main-content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Detail Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($list as $row) : ?>
                        <?php if (date('Y-m-d', strtotime($row['created_at'])) === date('Y-m-d')) : ?>
                            <tr class="bg-warning">
                                <td class="text-primary"><?= $no++; ?></td>
                                <td class="text-primary text-center"><?= ($row['kategori'] == 'insert') ? '<i data-feather="plus-circle">' : (($row['kategori'] == 'update') ? '<i data-feather="play-circle">' : '<i data-feather="minus-circle">'); ?></i></td>
                                <td class="text-primary"><?= $row['detail_pesan']; ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if (date('Y-m-d', strtotime($row['created_at'])) !== date('Y-m-d')) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="text-primary text-center"><?= ($row['kategori'] == 'insert') ? '<i data-feather="plus-circle">' : (($row['kategori'] == 'update') ? '<i data-feather="play-circle">' : '<i data-feather="minus-circle">'); ?></i></td>
                                <td><?= $row['detail_pesan']; ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>