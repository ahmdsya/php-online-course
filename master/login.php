<?php
    require_once('main.php');

    if (isset($_POST['adminLogin'])) {
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $login = $auth->login($email, $password);

        if ($login) {
            header('Location:index.php');
        }else {
            $session->flash('gagal-login', 'Gagal untuk masuk, silahkan coba lagi.');
            header('Location:login.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHP Online Course - Admin Login</title>

    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

</head>

<body style="background-color: #395FCF">

    <div class="container d-flex justify-content-center">
        <div class="row" style="margin-top:70px;">
            <div class="card" style="width: 350px;">
                <div class="card-header text-center">
                    Silahkan Masuk
                </div>
                <div class="card-body">
                <?php if($session->get('gagal-login')){ ?>
                <div class="alert alert-danger" role="alert">
                        <?= $session->get('gagal-login') ?>
                </div>
                <?php } ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Masukkan Password" required>
                    </div>
                    <button type="submit" name="adminLogin" class="btn btn-primary">Masuk</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>