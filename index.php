<?php require_once('main.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EDemy - Best Online Course</title>

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/modern-business.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">EDemy Online Course</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= !$page ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item <?= ($page == 'kategori' ? 'active' : '') ?> dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <?php foreach($helper->getKategori() as $row){ ?>
                            <a class="dropdown-item" href="index.php?page=kategori&id=<?= $row->id ?>"><?= $row->nama_kategori ?></a>
                            <?php } ?>
                        </div>
                    </li>
                    <?php if($isLogin){ ?>
                    <li class="nav-item <?= $page == 'kelas-saya' ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?page=kelas-saya">Kelas Saya</a>
                    </li>
                    <li class="nav-item <?= $page == 'profil' ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?page=profil">Ubah Profil</a>
                    </li>
                    <?php } ?>
                </ul>
                <div class="float-right" style="margin-left: 35px;">
                <?php if(!$isLogin){ ?>
                        <a href="login.php?uri=<?= str_replace('&', '@', $uri) ?>" class="btn btn-sm btn-success mr-1">Masuk</a>
                        <a href="register.php?uri=<?= str_replace('&', '@', $uri) ?>" class="btn btn-sm btn-info">Daftar</a>
                    <?php }else{ ?>
                        <a href="logout.php" class="btn btn-sm btn-danger">Keluar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <?php
        if (!$page) {
            include('pages/slider-home.php');
        }elseif ($page == 'detail' || $page == 'kelas-saya' || $page == 'kategori') {
            include('pages/slider-detail.php');
        }
    ?>
    
    <div class="container">
    
        <?php
            if (!$page) {
                include('pages/home.php');
            }elseif ($page == 'detail') {
                include('pages/detail.php');
            }elseif ($page == 'kategori') {
                include('pages/kategori.php');
            }elseif ($page == 'kelas-saya') {
                include('pages/kelas-saya.php');
            }elseif ($page == 'profil') {
                include('pages/profil.php');
            }
        ?>
    
    </div>

    <footer class="footer py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; <?= date('Y') ?> PHP Online Course System</p>
        </div>
    </footer>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>