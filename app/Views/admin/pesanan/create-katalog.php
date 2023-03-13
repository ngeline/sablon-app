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
                            <input type="date" class="form-control" id="tanggal_pemesanan"
                                placeholder="Masukkan Tanggal" />
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_pesanan">Jenis Pesanan</label>
                            <input type="text" class="form-control" id="jenis_pesanan" value="katalog" readonly />
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Readonly Input</label>
                            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                                value="You can't update me :P" />
                        </div>
                    </div>
                </div>
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