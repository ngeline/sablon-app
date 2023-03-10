<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="<?= base_url('/'); ?>"><img width="250"
                    src="<?= base_url(); ?>/users/images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item <?= uri_string() == '' ? 'active' : '' ?>"">
                        <a class=" nav-link" href="<?= base_url('/'); ?>">Home <span
                            class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= uri_string() == 'order' ? 'active' : '' ?>"">
                        <a class=" nav-link" href="<?= base_url('order'); ?>">Order</a>
                    </li>
                    <li class="nav-item <?= uri_string() == 'cek-invoice' ? 'active' : '' ?>"">
                        <a class=" nav-link" href="<?= base_url('cek-invoice'); ?>">Cek Invoice</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('login'); ?>" role="button" class="btn btn-primary ml-5">SIGN IN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>