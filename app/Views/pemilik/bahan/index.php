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
                            <td><?= $row['harga_jual']; ?></td>
                            <td>
                                <a href="#" class="btn icon icon-left btn-warning"><i data-feather="alert-triangle"></i> Update Data</a>
                                <a href="#" class="btn icon icon-left btn-danger"><i data-feather="alert-circle"></i> Delete Data</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
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
            <form action="#">
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
                                    <option value="1">1</option>
                                </select>
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
<script>
    $(function() {
        $(".selectize").selectize();
    });
</script>
<?= $this->endSection(); ?>