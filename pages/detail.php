<?php
    $kursus   = $detail->getKursus($_GET['id']);
    $materi   = $detail->getMateri($_GET['id']);
    $kategori = $detail->getKategori($kursus->kategori_id);
    $isEnroll = $detail->getEnroll($kursus->id, $session->get('user-id'));

    if(isset($_POST['enroll'])){
        $enroll = $detail->enroll($kursus->id, $session->get('user-id'));

        if($enroll){
            header('Location:index.php?page=detail&show='.$kursus->slug.'&id='.$kursus->id);
        }
    }
?>
<div class="container col-md-10">
    <div class="row mb-4" style="margin-top: -70px;">
        <div class="col-lg-8">
            <img class="img-fluid rounded" src="master/assets/img/<?= $kursus->gambar ?>"
                style="width:100%; height:350px">
            <div class="mt-4 mb-4">
                <?= $kursus->deskripsi ?>
            </div>
            <h3>Ikuti dan Pelajari</h3>
            <p>Materi kelas yang akan kita pelajari bersama</p>
            <?php foreach($materi as $row) { 
                $materiID[] = $row->id
            ?>
            <div class="card mb-2" style="background: #FBFBFB; height: 50px;">
                <div class="card-body" style="margin-top: -10px">
                    <?= $row->judul ?>
                    <p class="d-inline float-right"><?= $row->durasi.' menit' ?></p>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body my-4 text-center">
                     <?php if(!$isEnroll){ ?>
                        <small>Ikuti kelas untuk mengakses semua materi dalam kelas ini.</small>
                    <?php }else{ ?>
                        <small>Anda sudah mengikuti kelas ini. Selesaikan materi sekarang.</small>
                    <?php } ?>
                    
                    <?php if($isLogin){ ?>
                        <?php if($isEnroll){ ?>
                            <a href="materi.php?kelas=<?= $kursus->id ?>&materi=<?= $materiID[0] ?>" target="blank"
                                class="btn btn-block btn-success mt-2">Belajar Sekarang</a>
                        <?php }else{ ?>
                            <form method="post">
                                <button type="submit" name="enroll" class="btn btn-block btn-info mt-2">Ikuti Kelas</button>
                            </form>
                        <?php } ?>
                    <?php }else{ ?>
                    <button class="btn btn-block btn-info mt-2"
                        data-toggle="modal" data-target="#exampleModal">Ikuti Kelas</button>
                    <?php } ?>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <p class="card-text d-inline">Kategori</p>
                    <p class="card-text d-inline float-right"><span
                            class="badge badge-info"><?= $kategori->nama_kategori ?></span></p>
                </li>
                <li class="list-group-item">
                    <p class="card-text d-inline">Materi</p>
                    <p class="card-text d-inline float-right"><span class="badge badge-info"><?= count($materi) ?>
                            materi</span></p>
                </li>
                <li class="list-group-item">
                    <p class="card-text d-inline">Durasi</p>
                    <p class="card-text d-inline float-right">
                        <?php
                            $jlh_durasi = 0;
                            foreach($materi as $row){
                                $jlh_durasi += $row->durasi;
                            }
                            echo '<span class="badge badge-info">'.$jlh_durasi. ' menit</span>';
                        ?>
                    </p>
                </li>
                <li class="list-group-item">
                    <p class="card-text d-inline">Tingkat</p>
                    <p class="card-text d-inline float-right"><span
                            class="badge badge-info"><?= $kursus->tingkat ?></span></p>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center my-4">
                <p>Anda belum masuk, silahkan masuk terlebih dahulu.</p>
                <a href="login.php?uri=<?= str_replace('&', '@', $uri) ?>" class="btn btn-sm btn-success">Masuk</a>
                atau
                <a href="register.php?uri=<?= str_replace('&', '@', $uri) ?>" class="btn btn-sm btn-info">Daftar</a>
            </div>
        </div>
    </div>
</div>