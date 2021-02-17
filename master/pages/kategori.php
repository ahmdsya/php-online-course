<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori
    </button>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
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
                                <th width="10%">NO</th>
                                <th width="70%">Nama Kategori</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($kategori->get() as $row){ ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nama_kategori ?></td>
                                    <td class="text-center">
                                        <form method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal-<?= $row->id ?>">Ubah</button>
                                            <button type="submit" name="delKategori" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal Edit-->
                                <div class="modal fade" id="editModal-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="kategori">Nama Kategori</label>
                                                <input type="text" name="nama_kategori" class="form-control" id="kategori" value="<?= $row->nama_kategori ?>">
                                                <input type="hidden" name="id" class="form-control" value="<?= $row->id ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="editKategori" class="btn btn-primary">Tambah</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Modal Edit-->
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label for="kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" id="kategori" placeholder="Masukkan nama kategori" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="addKategori" class="btn btn-primary">Tambah</button>
        </div>
        </form>
        </div>
    </div>
</div>
<!-- /Modal Tambah-->
