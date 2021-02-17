
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Kursus</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dash->jlhKursus() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Kategori</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dash->jlhKategori() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-align-justify fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Peserta</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dash->jlhPeserta() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dash->jlhAdmin() ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kursus terbaru</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <?php $no=1; foreach($dash->getKursus() as $row){ ?>
                    <tr>
                        <th><?=  $no++ ?></th>
                        <th><?=  $row->judul ?></th>
                    </tr>
                    <?php } ?>
                </table>
                <a href="index.php?page=kursus" class="btn btn-sm btn-info mt-4">Lihat Semua</a>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Peserta Terbaru</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <?php $no=1; foreach($dash->getPeserta() as $row){ ?>
                    <tr>
                        <th><?=  $no++ ?></th>
                        <th><?=  $row->nama ?></th>
                        <th><?=  $row->email ?></th>
                    </tr>
                    <?php } ?>
                </table>
                <a href="index.php?page=peserta" class="btn btn-sm btn-warning mt-4">Lihat Semua</a>
            </div>
        </div>
    </div>

</div>