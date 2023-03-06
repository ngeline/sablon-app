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
                        <th>Nama Produk</th>
                        <th>Foto Produk</th>
                        <th>Harga Bahan</th>
                        <th>Harga Jual</th>
                        <th data-orderable="false">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($list as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td><img src="<?= base_url('assets/image/katalog/') . $row['foto_produk'] ?>" width="50" height="50"></td>
                            <td><?= number_format($row['harga_bahan'], 0, '', '.') ?></td>
                            <td><?= number_format($row['harga_jual'], 0, '', '.') ?></td>
                            <td>
                                <a class="btn icon icon-left btn-warning" id="btnEdit" data-id="<?= $row['id'] ?>"><i data-feather="alert-triangle"></i> Update Data</a>
                                <a class="btn icon icon-left btn-danger" id="btnDelete" data-id="<?= base_url('admin/kelola-katalog-produk/delete/' . $row['id']) ?>"><i data-feather="alert-circle"></i> Hapus Data</a>
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
                    Tambah Data Produk
                </h4>
            </div>
            <form action="<?= base_url('admin/kelola-katalog-produk/store') ?>" method="POST" enctype="multipart/form-data" files="true">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Produk</label>
                            <div class="form-group">
                                <input id="addNama" name="nama" type="text" placeholder="Nama Produk" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Foto Produk</label>
                            <div class="form-group">
                                <input id="addFoto" name="foto" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Jenis Bahan</label>
                            <div class="form-group">
                                <select name="bahan[]" id="addBahan" class="selectize" multiple>
                                    <option value=""></option>
                                    <?php foreach ($bahan as $row) : ?>
                                        <option value="<?= $row['id'] ?>" data-harga="<?= $row['harga_jual'] ?>"><?= $row['nama_bahan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Total Harga Bahan</label>
                            <div class="form-group">
                                <input id="addTotalBahan" name="totalBahan" type="number" placeholder="Otomatis terisi" class="form-control" min="0" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Jual</label>
                            <div class="form-group">
                                <input id="addJual" name="jual" type="number" placeholder="Harga Jual Produk" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Deskripsi Produk</label>
                            <div class="form-group">
                                <textarea name="deskripsi" id="addDeskripsi" cols="1" rows="7" class="form-control"></textarea>
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
                    Update Data Produk
                </h4>
            </div>
            <form action="<?= base_url('admin/kelola-katalog-produk/update') ?>" method="POST" enctype="multipart/form-data" files="true">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="editId">
                        <div class="col-md-6">
                            <label>Nama Produk</label>
                            <div class="form-group">
                                <input id="editNama" name="nama" type="text" placeholder="Nama Produk" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Foto Produk <span style="font-size: 9pt; color: red;">*kosongkan jika tidak update foto produk</span></label>
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
                            <label>Jenis Bahan Sebelumnya</label>
                            <div class="form-group">
                                <input id="editJenisBahanSebelumnya" name="JenisBahanSebelumnya" type="text" placeholder="Otomatis terisi" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Total Harga Bahan Sebelumnya</label>
                            <div class="form-group">
                                <input id="editTotalBahanSebelumnya" name="totalBahanSebelumnya" type="number" placeholder="Otomatis terisi" class="form-control" min="0" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Jenis Bahan <span style="font-size: 9pt; color: red;">*kosongkan jika tidak update jenis bahan</span></label>
                            <div class="form-group">
                                <select name="bahan[]" id="editBahan" class="selectize" multiple>
                                    <option value=""></option>
                                    <?php foreach ($bahan as $row) : ?>
                                        <option value="<?= $row['id'] ?>" data-harga="<?= $row['harga_jual'] ?>"><?= $row['nama_bahan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Total Harga Bahan</label>
                            <div class="form-group">
                                <input id="editTotalBahan" name="totalBahan" type="number" placeholder="Otomatis terisi" class="form-control" min="0" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Harga Jual</label>
                            <div class="form-group">
                                <input id="editJual" name="jual" type="number" placeholder="Harga Jual Produk" class="form-control" min="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Deskripsi Produk</label>
                            <div class="form-group">
                                <textarea name="deskripsi" id="editDeskripsi" cols="1" rows="7" class="form-control"></textarea>
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
<script src="<?= base_url('assets/library/ckeditor/ckeditor.js') ?>"></script>
<?= $this->include('admin/layouts/message-alert'); ?>
<script>
    $(function() {
        var sum = 0;

        $('#addBahan').selectize({
            placeholder: 'Pilih opsi dan dapat lebih dari satu...',
            valueField: 'value',
            labelField: 'label',
            searchField: 'label',
            render: {
                option: function(data, escape) {
                    return '<div data-harga="' + escape(data['harga']) + '">' + escape(data.label) + '</div>';
                }
            },
            onChange: function(value) {
                var selectize = this;
                var selectedDataIds = [];
                for (var i = 0; i < value.length; i++) {
                    var option = selectize.options[value[i]];
                    selectedDataIds.push(option.harga);
                }
                sum = 0;
                $.each(selectedDataIds, function(index, value) {
                    sum += value;
                });
                $('#addTotalBahan').val(sum);
            }
        });

        $('#editBahan').selectize({
            placeholder: 'Pilih opsi dan dapat lebih dari satu...',
            valueField: 'value',
            labelField: 'label',
            searchField: 'label',
            render: {
                option: function(data, escape) {
                    return '<div data-harga="' + escape(data['harga']) + '">' + escape(data.label) + '</div>';
                }
            },
            onChange: function(value) {
                var selectize = this;
                var selectedDataIds = [];
                for (var i = 0; i < value.length; i++) {
                    var option = selectize.options[value[i]];
                    selectedDataIds.push(option.harga);
                }
                sum = 0;
                $.each(selectedDataIds, function(index, value) {
                    sum += value;
                });
                $('#editTotalBahan').val(sum);
            }
        });
    });

    const lightbox = GLightbox({
        selector: '.glightbox'
    });

    $(document).ready(function() {
        let editor;

        ClassicEditor
            .create(document.querySelector('#addDeskripsi'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Link'],
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editDeskripsi'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Link'],
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });


        $('body').on('click', '#btnEdit', function() {
            var this_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "<?= base_url('admin/kelola-katalog-produk/edit') ?>",
                data: {
                    id: this_id,
                },
                success: function(response) {
                    $('#ModalUpdate').modal('show');
                    var encoded_data = response.data;
                    var decoded_data = JSON.parse(atob(encoded_data));
                    console.log(decoded_data)
                    $('#editId').val(decoded_data.katalog.id);
                    $('#editNama').val(decoded_data.katalog.nama_produk);
                    $('#editJenisBahanSebelumnya').val(decoded_data.bahan);
                    $('#editTotalBahanSebelumnya').val(decoded_data.katalog.harga_bahan);
                    $('#editJual').val(decoded_data.katalog.harga_jual);
                    editor.setData(decoded_data.katalog.deskripsi);
                    if ($('#btnImage').attr('href')) {
                        $('#btnImage').removeAttr('href');
                    }
                    $('#btnImage').attr('href', '<?= base_url('assets/image/katalog/') ?>' + decoded_data.katalog.foto_produk);
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