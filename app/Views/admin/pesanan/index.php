<?= $this->extend('admin/layouts/index') ;?>

<?= $this->section('main-content') ;?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <a class="btn icon icon-left btn-primary" data-bs-target="#modalCreate" data-bs-toggle="modal"><i
                    data-feather="edit"></i> Input Pesanan Katalog</a>

            <a class="btn icon icon-left btn-primary" data-bs-target="#modalCreate" data-bs-toggle="modal"><i
                    data-feather="edit"></i> Input Pesanan Custom</a>
        </div>

        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No.Invoice</th>
                        <th>Tanggal Pesanan</th>
                        <th>Nama Pemesan</th>
                        <th></th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>

                </tbody>
            </table>
        </div>

    </div>

</section>
<?= $this->endSection() ;?>