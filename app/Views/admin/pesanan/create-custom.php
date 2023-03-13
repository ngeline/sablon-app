<?= $this->extend('admin/layouts/index') ;?>

<?= $this->section('main-content') ;?>
<section class="section">
    <div class="card">

        <div class="card-body">
            <form action="<?= base_url(''); ?>" method="POST" enctype="multipart/form-data" files=true>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" id="tanggal_pemesanan" />
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Lengkap Pemesan</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="ktp">NIK KTP</label>
                            <input type="number" class="form-control" name="ktp" id="ktp"
                                placeholder="Masukkan NIK KTP">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_pesanan">Jenis Pesanan</label>
                            <input type="text" class="form-control" id="jenis_pesanan" value="custom" readonly />
                        </div>
                        <div class="form-group">
                            <label for="ktp">NIK KTP</label>
                            <input type="number" class="form-control" name="ktp" id="ktp"
                                placeholder="Masukkan NIK KTP">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP (Whatsapp)</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp"
                                placeholder="Masukkan No.HP yang terhubung ke Whatsapp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pemesan">Alamat Pemesan</label>
                        <textarea class="form-control" id="alamat_pemesan" rows="2"
                            placeholder="Masukkan Alamat Pemesan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat_pengiriman">Alamat Pengiriman</label>
                        <textarea class="form-control" id="alamat_pengiriman" rows="2"
                            placeholder="Masukkan Alamat Pengiriman"></textarea>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_barang">Jenis Barang Pesanan</label>
                            <input type="text" class="form-control" name="jenis_barang" id="jenis_barang"
                                placeholder="Masukkan Jenis Barang Pesanan">
                        </div>
                        <div class="form-group">
                            <label for="design">Design Pesanan</label>
                            <input class="form-control" type="file" id="design" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="bahan">Pilih Bahan</label>
                            <select class="form-select" id="bahan">
                                <option value="">Pilihan...</option>
                                <option>IT</option>
                                <option>Blade Runner</option>
                                <option>Thor Ragnarok</option>
                            </select>
                        </fieldset>

                        <div class="form-group">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                            <input type="number" class="form-control" name="jumlah_pesanan" id="jumlah_pesanan"
                                placeholder="Masukkan Jumlah Pesanan">
                            <p>
                                <small class="text-muted">Minimal Pemesanan 1 lusin ( 12Pcs )</small>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Detail Pesanan</label>
                        <textarea class="form-control" id="keterangan" rows="2"
                            placeholder="Masukkan Alamat Pemesan"></textarea>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total_custom">Total Biaya Custom Pesanan</label>
                            <input type="number" class="form-control" name="total_custom" id="total_custom"
                                placeholder="Masukkan Total Biaya Custom Pesanan">
                        </div>
                        <div class="form-group">
                            <label for="total_pesanan">Total Pembayaran Custom Pesanan</label>
                            <input type="number" class="form-control" name="total_pesanan" id="total_pesanan"
                                placeholder="Masukkan Total Pembayaran Custom Pesanan">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total_jasa">Total Jasa Custom Pesanan</label>
                            <input type="number" class="form-control" name="total_jasa" id="total_jasa"
                                placeholder="Masukkan Total Jasa Custom Pesanan">
                        </div>
                    </div>

                </div>
                <br>
                <div class="col-12 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary w-20 me-3">
                        Submit
                    </button>
                    <a href="<?= base_url('pesanan'); ?>" role="button" class="btn btn-light-secondary w-20">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ;?>