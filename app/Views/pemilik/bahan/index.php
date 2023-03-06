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
                                <a href="javacript:void(0)" class="btn icon icon-left btn-warning" id="btnEdit" data-id="<?= $row['id'] ?>"><i data-feather="alert-triangle"></i> Update Data</a>
                                <a href="javacript:void(0)" class="btn icon icon-left btn-danger" id="btnDelete" data-id="<?= base_url('pemilik/kelola-bahan/delete/' . $row['id']) ?>"><i data-feather="alert-circle"></i> Hapus Data</a>
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
                                    <option value=""></option>
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
                                    <option value=""></option>
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

<!--Modal Update -->
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
                        <input type="hidden" name="id" id="editId">
                        <div class="col-md-6">
                            <label>Nama Bahan</label>
                            <div class="form-group">
                                <input id="editNama" name="nama" type="text" placeholder="Nama Bahan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Foto Bahan <span style="font-size: 11px; color: red;">*kosongkan jika tidak update foto</span></label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 px-2">
                                        <a type="button" class="btn icon btn-warning w-100 glightbox" id="btnImage"><i data-feather="eye"></i></a>
                                    </div>
                                    <div class="col-md-10 px-2">
                                        <input id="editFoto" name="foto" type="file" class="form-control w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Kualitas Bahan</label>
                            <div class="form-group">
                                <select name="kualitas" id="editKualitas" class="selectize">
                                    <option value=""></option>
                                    <?php foreach ($kualitas as $row) : ?>
                                        <option value="<?= $row['kualitas'] ?>"><?= $row['kualitas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Bahan</label>
                            <div class="form-group">
                                <select name="jenis" id="editJenis" class="selectize">
                                    <option value=""></option>
                                    <?php foreach ($jenis as $row) : ?>
                                        <option value="<?= $row['jenis'] ?>"><?= $row['jenis'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Beli</label>
                            <div class="form-group">
                                <input id="editBeli" name="beli" type="number" placeholder="Harga Beli Bahan" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Jual</label>
                            <div class="form-group">
                                <input id="editJual" name="jual" type="number" placeholder="Harga Jual Bahan" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <div class="form-group">
                                <textarea name="keterangan" id="editKeterangan" cols="1" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning">Simpan</button>
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
            placeholder: 'Pilih opsi atau tambahkan...',
            create: true,
        });
    });

    const lightbox = GLightbox({
        selector: '.glightbox'
    });

    $(document).ready(function() {
        $('body').on('click', '#btnEdit', function() {
            var this_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "<?= base_url('pemilik/kelola-bahan/edit') ?>",
                data: {
                    id: this_id,
                },
                success: function(response) {
                    $('#ModalUpdate').modal('show');
                    var encoded_data = response.data;
                    var decoded_data = JSON.parse(atob(encoded_data));
                    $('#editId').val(decoded_data.bahan.id);
                    $('#editNama').val(decoded_data.bahan.nama_bahan);
                    $('#editKualitas')[0].selectize.setValue(decoded_data.bahan.kualitas);
                    $('#editJenis')[0].selectize.setValue(decoded_data.bahan.jenis);
                    $('#editBeli').val(decoded_data.bahan.harga_beli);
                    $('#editJual').val(decoded_data.bahan.harga_jual);
                    $('#editKeterangan').val(decoded_data.bahan.keterangan);
                    if ($('#btnImage').attr('href')) {
                        $('#btnImage').removeAttr('href');
                    }
                    $('#btnImage').attr('href', '<?= base_url('assets/image/bahan/') ?>' + decoded_data.bahan.foto_bahan);
                    lightbox.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('AJAX error:');
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        });

        $('body').on('click', '#btnDelete', function() {
            var this_id = $(this).data('id');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Kembali',
            }).then((result) => {
                if (result.value) {
                    window.location.href = this_id;
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>