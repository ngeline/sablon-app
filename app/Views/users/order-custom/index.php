<?= $this->extend('users/layouts/index'); ?>

<?= $this->section('main-content'); ?>

<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Pesanan <span>Custom</span>
            </h2>
        </div>
        <form action="<?= base_url(''); ?>" method="post" enctype="multipart/form-data" files=true>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="tanggal_pesanan">Tanggal Pemesanan</label>
                    <input type="date" class="form-control" id="tanggal_pesanan" value="<?= date("Y-m-d"); ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="jenis_pesanan">Jenis Pesanan</label>
                    <input type="text" class="form-control" id="jenis_pesanan" value="custom" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group col-md-6">
                    <label for="ktp">NIK KTP</label>
                    <input type="number" class="form-control" id="ktp" placeholder="Masukkan NIK KTP">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_pemesan">Alamat Pemesan</label>
                <input type="text" class="form-control" id="alamat_pemesan" placeholder="Masukkan Alamat Pemesan">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telephone">No. HP (Whatsapp)</label>
                    <input type="text" class="form-control" id="telephone" placeholder="Masukkan No. HP">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jenis_barang">Jenis Barang</label>
                    <input type="text" class="form-control" id="jenis_barang" placeholder="Masukkan Jenis Barang">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Bahan</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="jumlah_pesanan">Jumlah Pesanan</label>
                    <input type="text" class="form-control" id="jumlah_pesanan" placeholder="Jumlah Pemesanan Barang">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="custom_foto">Design Pesanan</label>
                    <input type="file" class="form-control" id="custom_foto">
                </div>
                <div class="form-group col-md-8">
                    <label for="keterangan">Detail Pesanan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="Masukkan Detail Pemesanan">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="total_biaya_custom">Total Biaya Custom Pesanan</label>
                    <input type="number" class="form-control" id="total_biaya_custom" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="total_jasa">Total Jasa Pesanan Custom</label>
                    <input type="number" class="form-control" id="total_jasa" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="total_jasa">Total Pembayaran Pesanan</label>
                    <input type="number" class="form-control" id="total_jasa" readonly>
                </div>
            </div>
            <a href="<?= base_url("order"); ?>" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary btn-md">Buat Pesanan</button>
        </form>
    </div>
</section>
<!-- end product section -->
<?= $this->endSection(); ?>