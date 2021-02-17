<?php
    $sub = (isset($_GET['sub']) ? $_GET['sub'] : false);
    if (!$isLogin) {
        header('Location:index.php');
    }
?>
<h1 class="mt-4 mb-3">
    <small>User Dashboard</small>
</h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row" style="margin-bottom: 140px;">
    <div class="col-lg-3 mb-4">
        <div class="list-group">
            <a href="index.php?page=dashboard" class="list-group-item active">Dashboard</a>
            <a href="#" class="list-group-item">Kelas Saya</a>
            <a href="#" class="list-group-item">Ubah Profil</a>
            <a href="logout.php" class="list-group-item">Keluar</a>
        </div>
    </div>
    <div class="col-lg-9 mb-4">
        <h2>Section Heading</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, et temporibus, facere perferendis veniam
            beatae non debitis, numquam blanditiis necessitatibus vel mollitia dolorum laudantium, voluptate dolores
            iure maxime ducimus fugit.</p>
    </div>
</div>