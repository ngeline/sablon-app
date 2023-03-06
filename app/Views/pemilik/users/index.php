<?= $this->extend('admin/layouts/index'); ?>

<?= $this->section('main-content'); ?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <a class="btn icon icon-left btn-primary" data-bs-target="#createData" data-bs-toggle="modal"><i data-feather="edit"></i> Tambah Data User</a>
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>
                                <a href="#" class="btn icon icon-left btn-warning"><i data-feather="alert-triangle"></i> Update User</a>
                                <a href="#" class="btn icon icon-left btn-danger"><i data-feather="alert-circle"></i> Delete User</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!--create user form Modal -->
<div class="modal fade text-left" id="createData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">
                    Create User
                </h4>
            </div>
            <form action="<?= base_url('pemilik/users/store') ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <label>Username</label>
                    <div class="form-group">
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control" />
                    </div>
                    <label for="password">Kata Sandi: </label>
                    <div class="form-group">
                        <input type="password" id="password" name="password" placeholder="Kata Sandi" class="form-control" required />
                    </div>
                    <label>Role User: </label>
                    <div class="form-group">
                        <input id="role" name="role" type="text" placeholder="Role User" class="form-control" value="admin" readonly />
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
<?= $this->section('script'); ?>
<?= $this->include('admin/layouts/message-alert'); ?>
<script>
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm-password");

    confirmPasswordField.addEventListener("input", () => {
        if (confirmPasswordField.value !== passwordField.value) {
            confirmPasswordField.setCustomValidity("Passwords do not match");
        } else {
            confirmPasswordField.setCustomValidity("");
        }
    });
</script>
<?= $this->endSection(); ?>


<?= $this->endSection(); ?>