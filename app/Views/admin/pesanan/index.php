<?= $this->extend('admin/layouts/index') ;?>

<?= $this->section('main-content') ;?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <a class="btn icon icon-left btn-primary" data-bs-target="#modalCreateKatalog" data-bs-toggle="modal"><i
                    data-feather="edit"></i> Input Pesanan Katalog</a>

            <a class="btn icon icon-left btn-primary" data-bs-target="#modalCreateCustom" data-bs-toggle="modal"><i
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

<!-- Modal Input Pesanan Katalog -->
<div class="modal fade text-left" id="modalCreateKatalog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">
                    Input Pesanan Katalog
                </h4>
            </div>
            <form action="<?= base_url('') ?>" method="POST" enctype="multipart/form-data" files=true>
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <label>Username</label>
                    <div class="form-group">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control" />
                    </div>
                    <label for="password">Kata Sandi: </label>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Kata Sandi"
                            class="form-control" required />
                    </div>
                    <label>Role User: </label>
                    <div class="form-group">
                        <input id="role" name="role" type="text" placeholder="Role User" class="form-control"
                            value="admin" readonly />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Input Pesanan Custom -->

<div class="modal fade text-left" id="modalCreateCustom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">
                    Input Pesanan Custom
                </h4>
            </div>
            <form action="<?= base_url('') ?>" method="POST" enctype="multipart/form-data" files=true>
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <label>Username</label>
                    <div class="form-group">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control" />
                    </div>
                    <label for="password">Kata Sandi: </label>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Kata Sandi"
                            class="form-control" required />
                    </div>
                    <label>Role User: </label>
                    <div class="form-group">
                        <input id="role" name="role" type="text" placeholder="Role User" class="form-control"
                            value="admin" readonly />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ;?>