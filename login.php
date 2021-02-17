<?php
    require_once('main.php');
    
    if (isset($_POST['login'])) {
        $uri   = (isset($_GET['uri']) ? $_GET['uri'] : false);
        $email = $_POST['email'];
        $pass  = $_POST['password'];

        $login = $auth->login($email, $pass);

        if ($login) {
            if($uri){
                header('Location:'.str_replace('@', '&', $uri));
            }else {
                header('Location:index.php');
            }
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
                    Selamat Datang
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Masukkan email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Masuk</button>
                        <small class="ml-3">Atau <a href="register.php">daftar</a> jika belum punya akun.</small>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>