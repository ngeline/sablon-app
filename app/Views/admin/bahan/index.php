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
                                <a class="btn icon icon-left btn-info text-white" id="btnEdit" data-id="<?= $row['id'] ?>"><i data-feather="info"></i> Detail Data</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!--Modal Detail -->
<div class="modal fade text-left" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel34">
                    Detail Data Bahan
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nama Bahan</label>
                        <div class="form-group">
                            <input id="editNama" name="nama" type="text" placeholder="Nama Bahan" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Foto Bahan</label>
                        <div class="form-group">
                            <a type="button" class="btn icon btn-warning w-100 glightbox" id="btnImage"><i data-feather="eye"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Kualitas Bahan</label>
                        <div class="form-group">
                            <input id="editKualitas" name="kualitas" type="text" placeholder="Kualitas" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Jenis Bahan</label>
                        <div class="form-group">
                            <input id="editJenis" name="jenis" type="text" placeholder="Jenis" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Harga Beli</label>
                        <div class="form-group">
                            <input id="editBeli" name="beli" type="number" placeholder="Harga Beli Bahan" class="form-control" min="0" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Harga Jual</label>
                        <div class="form-group">
                            <input id="editJual" name="jual" type="number" placeholder="Harga Jual Bahan" class="form-control" min="0" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Keterangan</label>
                        <div class="form-group">
                            <textarea name="keterangan" id="editKeterangan" cols="1" rows="3" class="form-control" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });

    $(document).ready(function() {
        $('body').on('click', '#btnEdit', function() {
            var this_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/data-bahan/detail') ?>",
                data: {
                    id: this_id,
                },
                success: function(response) {
                    $('#ModalUpdate').modal('show');
                    var encoded_data = response.data;
                    var decoded_data = JSON.parse(atob(encoded_data));
                    $('#editNama').val(decoded_data.bahan.nama_bahan);
                    $('#editKualitas').val(decoded_data.bahan.kualitas);
                    $('#editJenis').val(decoded_data.bahan.jenis);
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
    });
</script>
<?= $this->endSection(); ?>