<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Admin</h1>
    <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addModal">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Admin
    </button>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
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
                                <th width="40%">Nama Admin</th>
                                <th width="30%">Email</th>
                                <th width="20%" class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($admin->getData() as $row){ ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                    <?php if($row->id == $session->get('admin-id')){
                                            echo $row->nama.' <span class="badge badge-success">Anda</span>';
                                        }else{
                                            echo $row->nama;
                                        }
                                    ?>
                                    </td>
                                    <td><?= $row->email ?></td>
                                    <td class="text-center">
                                        <form method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <button type="submit" name="delAdmin" 
                                                class="btn btn-sm btn-danger"
                                                <?= ($row->id == $session->get('admin-id') ? 'disabled' : '') ?>>Hapus</button>
                                        </form>
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

<!-- Modal Tambah-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label for="nama">Nama Admin</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama admin" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="addAdmin" class="btn btn-primary">Tambah</button>
        </div>
        </form>
        </div>
    </div>
</div>
<!-- /Modal Tambah-->
