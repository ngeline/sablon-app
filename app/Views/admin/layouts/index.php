<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="<?= base_url(); ?>/admin/assets/css/main/app.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/admin/assets/css/main/app-dark.css" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/admin/assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/admin/assets/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="<?= base_url(); ?>/admin/assets/css/shared/iconly.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/admin/assets/css/pages/datatables.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/admin/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/admin/assets/css/pages/fontawesome.css" />
</head>

<body>
    <script src="<?= base_url(); ?>/admin/assets/js/initTheme.js"></script>
    <div id="app">
        <?= $this->include('admin/layouts/sidebar'); ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3><?= $title; ?></h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?= $title; ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <?= $this->renderSection('main-content'); ?>
                </div>
            </div>


            <?= $this->include('admin/layouts/footer'); ?>
        </div>
    </div>
    <script src="<?= base_url(); ?>/admin/assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>/admin/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="<?= base_url(); ?>/admin/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>/admin/assets/js/pages/dashboard.js"></script>
    <script src="<?= base_url(); ?>/admin/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="<?= base_url(); ?>/admin/assets/js/pages/datatables.js"></script>

    <?= $this->renderSection('script'); ?>

</body>

</html>