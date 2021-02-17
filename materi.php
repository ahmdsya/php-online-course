<?php
  require_once('main.php');
  $kelasID  = (isset($_GET['kelas']) ? $_GET['kelas'] : false);
  $materiID = (isset($_GET['materi']) ? $_GET['materi'] : false);

  $dataMateri   = $detail->getMateri($kelasID);
  $showMateri   = $detail->showMateri($materiID);
  $videoID      = substr($showMateri->video_url, -11);
  
  if (!$isLogin || !$kelasID || !$materiID) {
      header('Location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mulai Belajar - Edemy Online Course</title>

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Mulai Belajar </div>
      <div class="list-group list-group-flush" style="overflow-y: scroll; height: 600px;">
        <?php foreach($dataMateri as $row){ ?>
        <a href="materi.php?kelas=<?= $kelasID ?>&materi=<?= $row->id ?>"
            class="list-group-item list-group-item-action <?= ($row->id == $materiID ? 'bg-info text-white' : 'bg-light') ?>">
            <?= $row->judul ?>
        </a>
        <?php } ?>
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-info" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/index.php?page=dashboard">Dashboard</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h3 class="mt-4 mb-2"><?= $showMateri->judul ?></h3>
        <iframe width="100%" height="500"
          src="https://www.youtube.com/embed/<?= $videoID ?>?autoplay=1">
        </iframe>
      </div>
    </div>

  </div>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>