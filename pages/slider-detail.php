<?php
    if($page == 'detail'){
        $kursus   = $detail->getKursus($_GET['id']);
        $materi   = $detail->getMateri($_GET['id']);
        $kategori = $detail->getKategori($kursus->kategori_id);
    }elseif($page == 'kelas-saya') {
        $jlh_kelas = count($kls_saya->getData($session->get('user-id')));
    }else {
        $get_kategori = $kategori->showKategori($_GET['id']);
    }
?>

<?php if($page == 'detail'){ ?>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background: url('master/assets/img/back.png');height: 200px;">
                <div class="text-white text-center" style="margin-top: 70px;">
                    <h1><?= $kursus->judul ?></h1>
                    <span class="badge badge-success mr-2"><?= $kategori->nama_kategori ?></span>
                    <span class="badge badge-success"><?= $kursus->tingkat ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php }elseif($page == 'kelas-saya'){ ?>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background: url('master/assets/img/back.png');height: 200px;">
                <div class="text-white text-center" style="margin-top: 70px;">
                    <h1>Kelas Yang Anda Ikuti</h1>
                    <span class="badge badge-success mr-2"><?= $jlh_kelas ?> Total Kelas</span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php }else{ ?>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background: url('master/assets/img/back.png');height: 200px;">
                <div class="text-white text-center" style="margin-top: 70px;">
                    <h1>Kelas Untuk Kategori <?= $get_kategori->nama_kategori ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<?php } ?>