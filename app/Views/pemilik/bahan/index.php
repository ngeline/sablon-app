<?= $this->extend('admin/layouts/index'); ?>

<?= $this->section('main-content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <a class="btn icon icon-left btn-primary" data-bs-target="#ModalCreate" data-bs-toggle="modal"><i data-feather="edit"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bahan</th>
                        <th>Kualitas</th>
                        <th>Jenis</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th data-orderable="false">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($list as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_bahan']; ?></td>
                            <td><?= $row['kualitas']; ?></td>
                            <td><?= $row['jenis']; ?></td>
                            <td><?= number_format($row['harga_beli'], 0, '', '.') ?></td>
                            <td><?= number_format($row['harga_jual'], 0, '', '.') ?></td>
                            <td>
                                <a href="#" class="btn icon icon-left btn-warning" data-bs-target="#ModalUpdate" data-bs-toggle="modal"><i data-feather="alert-triangle"></i> Update Data</a>
                                <a href="#" class="btn icon icon-left btn-danger"><i data-feather="alert-circle"></i> Delete Data</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!--Modal Create -->
<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">
                    Tambah Data Bahan
                </h4>
            </div>
            <form action="<?= base_url('pemilik/kelola-bahan/store') ?>" method="POST" enctype="multipart/form-data" files="true">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Bahan</label>
                            <div class="form-group">
                                <input id="addNama" name="nama" type="text" placeholder="Nama Bahan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Foto Bahan</label>
                            <div class="form-group">
                                <input id="addFoto" name="foto" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kualitas Bahan</label>
                            <div class="form-group">
                                <select name="kualitas" id="addKualitas" class="selectize">
                                    <?php foreach ($kualitas as $row) : ?>
                                        <option value="<?= $row['kualitas'] ?>"><?= $row['kualitas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Bahan</label>
                            <div class="form-group">
                                <select name="jenis" id="addJenis" class="selectize">
                                    <?php foreach ($jenis as $row) : ?>
                                        <option value="<?= $row['jenis'] ?>"><?= $row['jenis'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Beli</label>
                            <div class="form-group">
                                <input id="addBeli" name="beli" type="number" placeholder="Harga Beli Bahan" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Jual</label>
                            <div class="form-group">
                                <input id="addJual" name="jual" type="number" placeholder="Harga Jual Bahan" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <div class="form-group">
                                <textarea name="keterangan" id="addKeterangan" cols="1" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
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

<!--Modal Create -->
<div class="modal fade text-left" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel34">
                    Update Data Bahan
                </h4>
            </div>
            <form action="<?= base_url('pemilik/kelola-bahan/update') ?>" method="POST" enctype="multipart/form-data" files="true">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Bahan</label>
                            <div class="form-group">
                                <input id="addNama" name="nama" type="text" placeholder="Nama Bahan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Foto Bahan</label>
                            <div class="form-group">
                                <input id="addFoto" name="foto" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kualitas Bahan</label>
                            <div class="form-group">
                                <select name="kualitas" id="addKualitas" class="selectize">
                                    <?php foreach ($kualitas as $row) : ?>
                                        <option value="<?= $row['kualitas'] ?>"><?= $row['kualitas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Bahan</label>
                            <div class="form-group">
                                <select name="jenis" id="addJenis" class="selectize">
                                    <?php foreach ($jenis as $row) : ?>
                                        <option value="<?= $row['jenis'] ?>"><?= $row['jenis'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Beli</label>
                            <div class="form-group">
                                <input id="addBeli" name="beli" type="number" placeholder="Harga Beli Bahan" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Jual</label>
                            <div class="form-group">
                                <input id="addJual" name="jual" type="number" placeholder="Harga Jual Bahan" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <div class="form-group">
                                <textarea name="keterangan" id="addKeterangan" cols="1" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
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

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<?= $this->include('admin/layouts/message-alert'); ?>
<script>
    $(function() {
        $(".selectize").selectize({
            create: true
        });
    });
</script>
<?= $this->endSection(); ?>