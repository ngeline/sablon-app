<?= $this->extend('users/layouts/index'); ?>

<?= $this->section('css-inline'); ?>
<style>
    .table-container {
        display: flex;
        margin-left: 40px;
        margin-right: 40px;
        margin-bottom: 100px;
        justify-content: center;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    td,
    th {
        padding: 8px;
        border: 1px solid #ddd;
    }

    @media screen and (max-width: 600px) {

        /* hide table headers */
        thead {
            display: none;
        }

        /* make cells display as block-level elements */
        td {
            display: block;
            text-align: right;
        }

        /* add a border to bottom of cells */
        td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            display: inline-block;
            width: 60%;
            margin-right: 10px;
            text-align: left;
        }
    }
</style>
<?= $this->endSection(); ?>


<?= $this->section('main-content'); ?>
<!-- inner page section -->
<section class="inner_page_head">
    <div class="container_fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Cek Invoice Pesanan</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->

<!-- input form section -->
<section class="why_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="full">
                    <form action="#" method="POST">
                        <fieldset>
                            <input type="number" placeholder="Masukkan No Invoice Pesanan" name="no_invoice" required />
                            <input type="submit" value="Submit" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<div class="table-container">
    <table>
        <tr>
            <th>No Invoice</th>
            <th>Nama Pemesan</th>
            <th>Tambahan Biaya (Custom Pesanan)</th>
            <th>Total Bayar</th>
            <th>Verifikasi Pesanan</th>
            <th>Verifikasi Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>Row 1, Column 1</td>
            <td>Row 1, Column 2</td>
            <td>Row 1, Column 3</td>
            <td>Row 1, Column 4</td>
            <td>Row 1, Column 5</td>
            <td>Row 1, Column 6</td>
            <td>
                <a href="#" role="button" class="btn btn-primary">Detail Pesanan</a>
            </td>
        </tr>
        <!-- //<?php //if ($data == null) { 
                ?>
        <tr>
            <td colspan="3">No data available</td>
        </tr>
    <?php //} 
    ?> -->
    </table>

</div>
<!-- end why section -->



<?= $this->endSection(); ?>