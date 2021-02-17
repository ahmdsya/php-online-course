<?php

if ($page == 'kategori') {
    if (isset($_POST['editKategori'])) {
        $req = [
            'nama_kategori' => $_POST['nama_kategori']
        ];

        $ubah = $kategori->ubah($req, $_POST['id']);

        if ($ubah) {
            $helper->alert('sukses', 'Berhasil mengubah data.', $session);
            header('Location:index.php?page=kategori');
        }else {
            $helper->alert('gagal', 'Gagal mengubah data.', $session);
            header('Location:index.php?page=kategori');
        }
    }
}elseif ($page == 'kursus') {
    if (isset($_POST['editMateri'])) {
        $id        = $_POST['id'];
        $id_kursus = $_POST['id_kursus'];
        $judul     = $_POST['judul'];
        $video_url = $_POST['video_url'];
        $durasi    = $_POST['durasi'];

        $req = [
            'judul' => $judul,
            'video_url' => $video_url,
            'durasi' => $durasi
        ];

        $ubah = $materi->ubah($req, $id);

        if ($ubah) {
            $helper->alert('sukses', 'Berhasil mengubah data.', $session);
            if ($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=add&id='.$id_kursus);
            }elseif($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=edit&id='.$id_kursus);
            }
            
        }else {
            $helper->alert('gagal', 'Gagal mengubah data.', $session);
            if ($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=add&id='.$id_kursus);
            }elseif($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=edit&id='.$id_kursus);
            }
        }
    }

    if (isset($_POST['editKursus'])) {
        $id          = $_POST['id'];
        $judul       = $_POST['judul'];
        $deskripsi   = $_POST['deskripsi'];
        $kategori_id = $_POST['kategori_id'];
        $tingkat     = $_POST['tingkat'];
        $status      = $_POST['status'];

        // var_dump($_FILES['gambar']);

        if (!empty($_FILES['gambar']['name'])) {
            $gambar      = $_FILES['gambar']['tmp_name'];
            $nama_gambar = uniqid().'.png';
            $data        = $kursus->show($id);

            $req = [
                'judul' => $judul,
                'slug' => $helper->slug($judul),
                'deskripsi' => $deskripsi,
                'kategori_id' => $kategori_id,
                'tingkat' => $tingkat,
                'gambar' => $nama_gambar,
                'status' => $status
            ];
            
            $upload_file = move_uploaded_file($gambar, 'assets/img/'.$nama_gambar);
            if ($upload_file) {
                unlink('assets/img/'.$data->gambar);
                $ubah = $kursus->ubah($req, $id);
            }

        }else {
            $req = [
                'judul' => $judul,
                'slug' => $helper->slug($judul),
                'deskripsi' => $deskripsi,
                'kategori_id' => $kategori_id,
                'tingkat' => $tingkat,
                'status' => $status
            ];

            $ubah = $kursus->ubah($req, $id);
        }

        if ($ubah) {
            $helper->alert('sukses', 'Berhasil mengubah data.', $session);
            header('Location:index.php?page=kursus&sub=edit&id='.$id);
        }else {
            $helper->alert('gagal', 'Gagal mengubah data.', $session);
            header('Location:index.php?page=kursus&sub=edit&id='.$id);
        }
    }

    if (isset($_POST['editKursusStatus'])) {
        $ubahStatus = $kursus->ubahKursusStatus($_POST['id']);

        if ($ubahStatus) {
            $helper->alert('sukses', 'Berhasil di publikasikan.', $session);
            header('Location:index.php?page=kursus');
        }else {
            $helper->alert('gagal', 'Gagal di publikasikan.', $session);
            header('Location:index.php?page=kursus');
        }
    }
}elseif ($page == 'profil') {
    if (isset($_POST['editProfil'])) {
        $id       = $session->get('admin-id');
        $nama     = $_POST['nama'];
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $req = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        ];

        $ubah = $profil->ubah($req, $id, $session);

        if ($ubah) {
            $helper->alert('sukses', 'Berhasil mengubah data.', $session);
            header('Location:index.php?page=profil');
        }else {
            $helper->alert('gagal', 'Gagal mengubah data.', $session);
            header('Location:index.php?page=profil');
        }
    }
}