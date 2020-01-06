<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi IKM</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/new/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/new/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/new/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/new/css/iofrm-theme4.css">
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <!-- <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="<?= base_url() ?>assets/login/new/images/logo-light.svg" alt="">
                </div>
            </a> -->
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?= base_url() ?>assets/login/new/images/graphic1.svg" alt="">
                </div>
                
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Selamat Datang !!</h3>
                        <p>Silahkan login untuk menggunakan aplikasi</p>
                        <div class="page-links">
                            <a href="login4.html" class="active">Login</a>
                        </div>
                        <form action="<?= base_url() ?>login" method="post">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" name="login" class="ibtn">Login</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?= base_url() ?>assets/login/new/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/login/new/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/login/new/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/login/new/js/main.js"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert2.js"></script>
</body>
        <?php if ($this->session->flashdata('alert') == 'fail_login') { ?>
            <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Username atau password salah !'
                })
            </script>
        <?php } ?>
        <?php if ($this->session->flashdata('alert') == 'layanan_null') { ?>
            <script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Oops...',
                  text: 'Silahkan Pilih Layanan Terlebih Dahulu !'
                })
            </script>
        <?php } ?>

</html>