<?php
    if (!$isLogin) {
        header('Location:index.php');
    }

    $get_profil = $profil->getProfile($session->get('user-id'));

    if (isset($_POST['updateProfil'])) {
        $id       = $session->get('user-id');
        $nama     = $_POST['nama'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $req = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        ];

        $update = $profil->update($req, $id, $session);

        if ($update) {
            $session->flash('sukses-profil', 'Berhasil mengubah profil.');
            header('Location:index.php?page=profil');
        }else {
            $session->flash('gagal-profil', 'Gagal mengubah profil.');
            header('Location:index.php?page=profil');
        }
    }
?>
<h1 class="mt-4 mb-3">
    <small>Ubah Profil</small>
</h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Ubah Profil</li>
</ol>

<div class="row mb-4">
    <div class="col-lg-9 mb-4">
        <?php if ($session->get('sukses-profil') || $session->get('gagal-profil')) { ?>
        <div class="alert <?= ($session->get('sukses-profil') ? 'alert-success' : 'alert-danger') ?> alert-dismissible fade show" role="alert">
            <?php if ($session->get('sukses-profil')) {
                    echo $session->get('sukses-profil');
                }elseif ($session->get('gagal-profil')) {
                    echo $session->get('gagal-profil');
                }
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <form method="POST" class="mt-4">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama"
                    value="<?= $get_profil->nama ?>">
            </div>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="<?= $get_profil->email ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password"
                    value="<?= $get_profil->password ?>">
            </div>
            <button type="submit" name="updateProfil" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>