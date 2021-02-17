<?php $getProfil = $profil->showProfile($session->get('admin-id')); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil</h1>
</div>

<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Profil</h6>
            </div>
            <div class="card-body">
                <?php
                if ($session->get('alert')) {
                    echo $session->get('alert');
                }
            ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="<?= $getProfil->nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="<?= $getProfil->email ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            value="<?= $getProfil->password ?>">
                    </div>
                    <button type="submit" name="editProfil" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>