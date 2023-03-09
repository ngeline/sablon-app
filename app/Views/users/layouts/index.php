<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/users/images/favicon.png" type="">
    <title>Wilis Sablon</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/users/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="<?= base_url(); ?>/users/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/users/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?= base_url(); ?>/users/css/responsive.css" rel="stylesheet" />
    <?= $this->renderSection('css-inline'); ?>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <?= $this->include('users/layouts/navbar'); ?>
        <!-- end header section -->
        <!-- slider section -->
        <?= $this->renderSection('slider'); ?>
        <!-- end slider section -->
    </div>

    <!-- main content -->

    <?= $this->renderSection('main-content'); ?>

    <!-- end main content -->

    <!-- footer start -->
    <?= $this->include('users/layouts/footer'); ?>
    <!-- footer end -->
    <div class="cpy_">
        <p>© 2023 All Rights Reserved By <a href="<?= base_url('/'); ?>"">Wilis Sablon™</a></p>
    </div>
    <!-- jQery -->
    <script src=" <?= base_url(); ?>/users/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="<?= base_url(); ?>/users/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url(); ?>/users/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="<?= base_url(); ?>/users/js/custom.js"></script>

    <?= $this->renderSection('script'); ?>
</body>

</html>