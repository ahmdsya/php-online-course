<?php
    require_once('main.php');
    
    if (isset($_POST['daftar'])) {
        $uri   = (isset($_GET['uri']) ? $_GET['uri'] : false);
        $nama  = $_POST['nama'];
        $email = $_POST['email'];
        $pass  = $_POST['password'];

        $regis = $auth->register($nama, $email, $pass);

        if ($regis) {
            if($uri){
                header('Location:'.str_replace('@', '&', $uri));
            }else {
                header('Location:index.php');
            }
        }else {
            $session->flash('alert', 'Gagal mendaftar, email yang anda masukkan sudah terdaftar.');
            header('Location:register.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Masuk EDemy - Best Online Course</title>

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body style="background-color: #d3e0ea">

    <div class="cointainer d-flex justify-content-center">
        <div class="row col-md-5">
            <div class="card" style="width: 30em;">
                <div class="card-header text-center">
                    Silahkan Mendaftar
                </div>
                <div class="card-body">
                    
                    <?php if($session->get('alert')){ ?>
                        <div class="alert alert-danger my-2" role="alert">
                            <?= $session->get('alert'); ?>
                        </div>
                    <?php } ?>

                    <form method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Masukkan password">
                        </div>
                        <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                        <small class="ml-3">Atau <a href="login.php">masuk</a> jika sudah punya akun.</small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>