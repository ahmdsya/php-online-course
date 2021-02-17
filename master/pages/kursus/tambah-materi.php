<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Materi</h1>
    <a href="index.php?page=kursus" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i>
        <?= count($materi->get($_GET['id'])) >= 1 ? 'Simpan' : 'Lewati' ?>
    </a>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Materi</h6>
                <div class="float-right" style="margin-top:-20px;">
                    <button class="btn btn-sm btn-success"
                        data-toggle="modal" data-target="#addModal">Tambah Materi Baru
                    </button>
                    <?php
                     if (count($materi->get($_GET['id'])) >= 1) { ?>
                        <form  method="POST" class="d-none d-sm-inline-block">
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <button type="submit" name="editKursusStatus" class="btn btn-sm btn-primary" >Publikasikan</button>
                        </form>
                     <?php } ?>
                </div>
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
                                <th width="40%">Judul Materi</th>
                                <th width="25%">Video URL</th>
                                <th width="15%">Durasi (menit)</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($materi->get($_GET['id']) as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->judul ?></td>
                                <td><?= $row->video_url ?></td>
                                <td class="text-center"><?= $row->durasi ?> menit</td>
                                <td class="text-center">
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?= $row->id ?>">
                                        <input type="hidden" name="id_kursus" value="<?= $_GET['id'] ?>">
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addModal-<?= $row->id ?>">Ubah</button>
                                        <button type="submit" name="delMateri" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal Ubah-->
                            <div class="modal fade" id="addModal-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Materi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row->id ?>">
                                        <input type="hidden" name="id_kursus" value="<?= $_GET['id'] ?>">
                                        <div class="form-group">
                                            <label for="judul">Judul Materi</label>
                                            <input type="text" name="judul" class="form-control" id="judul" value="<?= $row->judul ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="video_url">Video URL</label>
                                            <input type="text" name="video_url" class="form-control" id="video_url" value="<?= $row->video_url ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="durasi">Durasi (menit)</label>
                                            <input type="number" name="durasi" class="form-control" id="durasi" min="1" value="<?= $row->durasi ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="editMateri" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal Ubah-->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST">
        <div class="modal-body">
            <input type="hidden" name="id_kursus" value="<?= $_GET['id'] ?>">
            <div class="form-group">
                <label for="judul">Judul Materi</label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Materi" required>
            </div>
            <div class="form-group">
                <label for="video_url">Video URL</label>
                <input type="text" name="video_url" class="form-control" id="video_url" placeholder="https://www.youtube.com/watch?v=1dLbDhcxzeQ" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi (menit)</label>
                <input type="number" name="durasi" class="form-control" id="durasi" min="1" placeholder="25" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="addMateri" class="btn btn-primary">Tambah</button>
        </div>
        </form>
        </div>
    </div>
</div>
<!-- /Modal Tambah-->