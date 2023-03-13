<?= $this->extend('admin/layouts/index'); ?>

<?= $this->section('main-content'); ?>
<section class="section">
    <div class="card">

        <div class="card-body">
            <form action="<?= base_url('admin/input-katalog/store'); ?>" method="POST" id="formPesanan">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap Pemesan</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP (Whatsapp)</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No.HP yang terhubung ke Whatsapp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ktp">NIK KTP</label>
                            <input type="number" class="form-control" min="0" name="ktp" id="ktp" placeholder="Masukkan NIK KTP">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pemesan">Alamat Pemesan</label>
                        <textarea class="form-control" id="alamat_pemesan" name="alamat_pemesan" rows="2" placeholder="Masukkan Alamat Tempat Tinggal Pemesan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pengiriman">Alamat Pengiriman</label>
                        <textarea class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" rows="2" placeholder="Masukkan Alamat Pengiriman Pesanan"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAlamat">
                            <label class="form-check-label">
                                Sama dengan alamat pemesan
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="">Daftar Pesanan</label>
                            <div id="ListPesanan" class="border border-1">
                                <div class="row m-2">
                                    <table class="table table-striped" id="ListTables">
                                        <thead>
                                            <tr>
                                                <th style="width: 2%">No</th>
                                                <th>Produk</th>
                                                <th style="width: 20%;">Qty</th>
                                                <th style="width: 5%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <select name="katalog[]" id="katalog" class="selectize">
                                                        <option value=""></option>
                                                        <?php foreach ($katalog as $row) : ?>
                                                            <option value="<?= $row['id'] ?>" data-harga="<?= $row['harga_jual'] ?>"><?= $row['nama_produk'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="qty[]" id="qty" placeholder="Jumlah Barang">
                                                </td>
                                                <td><button type="button" name="addRows" id="addRows" class="btn btn-sm btn-primary w-100">+</button></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td><button id="btnJml" type="button" class="btn btn-sm btn-success w-100">=</button></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Total Harga Produk</label>
                            <input type="number" class="form-control" id="total_harga" placeholder="Otomatis terisi" readonly>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Total Jasa Sesuai Jumlah Pesanan</label>
                            <input type="number" class="form-control" id="total_jasa" placeholder="Otomatis terisi" readonly>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tambahan Biaya Lainnya</label>
                            <input type="number" class="form-control" name="biaya_lainnya" id="biaya_lainnya" placeholder="Masukkan Biaya Tambahan Bila Ada">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Total Pembayaran</label>
                            <input type="number" class="form-control" id="total_pembayaran" placeholder="Otomatis terisi" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Pelunasan</label>
                            <select name="jenis_pelunasan" id="jenis_pelunasan" class="selectize-pelunasan">
                                <option value=""></option>
                                <option value="dp">DP</option>
                                <option value="lunas">Lunas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Terbayar</label>
                            <input type="number" class="form-control" name="total_terbayar" id="total_terbayar" placeholder="Masukkan Total Uang Yang Diterima">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="2" placeholder="Masukkan Keterangan Pesanan"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-12 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary w-20 me-3">
                        Simpan
                    </button>
                    <a href="<?= base_url('admin/pesanan'); ?>" role="button" class="btn btn-light-secondary w-20">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<?= $this->include('admin/layouts/message-alert'); ?>
<script>
    const form = document.getElementById('formPesanan');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Kembali',
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        function selectizeDefine() {
            $('select[id=katalog]').selectize({
                placeholder: 'Pilih opsi...',
                valueField: 'value',
                labelField: 'label',
                searchField: 'label',
                render: {
                    option: function(data, escape) {
                        return '<div data-w="' + escape(data['harga']) + '">' + escape(data.label) + '</div>';
                    }
                },
            });

            $('#jenis_pelunasan').selectize({
                placeholder: 'Pilih opsi...',
            });
        }

        selectizeDefine();

        /* Dynamic field */
        $(function() {
            function numberRows($t) {
                var c = 0;
                $t.find("tbody tr").each(function(ind, el) {
                    $(el).find("td:eq(0)").html(++c + ".");
                });
            }
            $("#addRows").click(function(e) {
                e.preventDefault();
                var $row = $("<tr>");
                $row.append($("<td>"));
                $row.append($("<td>").html(
                    "<select name='katalog[]' id='katalog' class='selectize'><option value=''></option><?php foreach ($katalog as $row) : ?><option value='<?= $row['id'] ?>' data-harga='<?= $row['harga_jual'] ?>'><?= $row['nama_produk'] ?></option><?php endforeach; ?></select>"
                ));
                $row.append($("<td>").html(
                    "<input type='number' class='form-control' name='qty[]' id='qty' placeholder='Jumlah Barang'>"
                ));
                $row.append($("<td>").html(
                    "<button class='btn btn-sm btn-danger w-100' id='rmRows'>-</button>"
                ));
                $row.appendTo($("#ListTables tbody"));
                numberRows($("#ListTables"));

                selectizeDefine();
            });
            $("#ListTables").on("click", "#rmRows", function(e) {
                e.preventDefault();
                var $row = $(this).parent().parent();
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
                        $row.remove();
                        numberRows($("#ListTables"));
                    }
                });
            });
        });
    });

    $('#btnJml').click(function() {
        var sum = 0;
        var qty = 0;

        $('select[id="katalog"]').each(function() {
            var value = parseInt($(this)[0].selectize.getValue());
            if (value) {
                var selectedData = parseInt($(this)[0].selectize.options[value].harga);
                if (!isNaN(selectedData)) {
                    sum += selectedData;
                }
            }
        });

        // $('input[id="qty"]').each(function() {
        //     var value = parseInt($(this).val());
        //     if (!isNaN(value)) {
        //         qty += value;
        //     }
        // });

        $('#total_harga').val(sum);
        var biayaLain = parseInt($('#biaya_lainnya').val() || 0);
        // $('#total_jasa').val(Math.ceil(qty / 12) * 20000);
        $('#total_pembayaran').val(sum + biayaLain);
    });

    $('#biaya_lainnya').on('input', function() {
        var value = parseInt($(this).val());
        var total = parseInt($('#total_harga').val());
        var hasil = value + total
        $('#total_pembayaran').val(hasil);
    });

    $('#checkAlamat').on('change', function() {
        // Check if checkbox is checked
        if ($(this).is(':checked')) {
            // Get value of checkbox
            var value = $('#alamat_pemesan').val();
            $('#alamat_pengiriman').val(value);
        } else {
            $('#alamat_pengiriman').val('');
        }
    });
</script>
<?= $this->endSection(); ?>