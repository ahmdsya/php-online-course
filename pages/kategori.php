<div class="row mb-4" style="margin-top:-90px">
    <?php foreach($kategori->getKursusbyKategori($_GET['id']) as $row){ ?>
    <div class="col-lg-4 mb-4">
    <div class="card">
            <img class="card-img-top" src="master/assets/img/<?= $row['gambar'] ?>" width="100%" height="230">
            <div class="card-body">
                <h5 class="card-title"><?= $row['judul'] ?></h5>
                <p class="card-text"><?= substr($row['deskripsi'], 0, 115).'...' ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="card-text d-inline"><?= $row['tingkat'] ?></p>
                    <p class="card-text d-inline float-right"><?= $row['jlh_materi'] ?> Materi</p>
                </li>
            </ul>
            <div class="card-body">
                <h6 class="d-inline"><?= $helper->jlhPeserta($row['id']) ?> Peserta</h6>
                <a href="index.php?page=detail&show=<?= $row['slug'].'&id='.$row['id'] ?>" class="btn btn-sm btn-info card-link float-right">Selengkapnya</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>