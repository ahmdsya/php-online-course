<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kursus</h1>
    <a href="index.php?page=kursus&sub=add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kursus
    </a>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kursus</h6>
            </div>
            <div class="card-body">
                <?php
                    if ($session->get('alert')) {
                        echo $session->get('alert');
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">NO</th>
                                <th width="55%">Judul Kursus</th>
                                <th width="10%" class="text-center">Materi</th>
                                <th width="10%" class="text-center">Peserta</th>
                                <th width="10%" class="text-center">Status</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($kursus->getData() as $row){ ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['judul'] ?></td>
                                <td class="text-center"><?= $row['jlh_materi'] ?></td>
                                <td class="text-center"><?= $helper->jlhPeserta($row['id']) ?></td>
                                <td class="text-center">
                                    <?php
                                        if ($row['status'] == 0) {
                                            echo '<span class="badge badge-warning">Draft</span>';
                                        }else {
                                            echo '<span class="badge badge-success">Terpublikasi</span>';
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Pilih Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                        <form method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <?php if ($row['status'] == 0) { ?>
                                                <button type="submit" name="editKursusStatus" class="dropdown-item">Publikasikan</button>
                                            <?php } ?>
                                            <a class="dropdown-item" href="index.php?page=kursus&sub=edit&id=<?= $row['id'] ?>">Ubah Kursus/Materi</a>
                                            <button type="submit" name="delKursus" class="dropdown-item">Hapus</button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>