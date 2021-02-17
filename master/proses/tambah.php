<?php

if ($page == 'kategori') {
    if (isset($_POST['addKategori'])) {
        $req = [
            'nama_kategori' => $_POST['nama_kategori']
        ];

        $tambah = $kategori->tambah($req);

        if ($tambah) {
            $helper->alert('sukses', 'Berhasil menambahkan data.', $session);
            header('Location:index.php?page=kategori');
        }else {
            $helper->alert('gagal', 'Gagal menambahkan data.', $session);
            header('Location:index.php?page=kategori');
        }
    }
}elseif ($page == 'kursus') {
    if (isset($_POST['addKursus'])) {
        $judul       = $_POST['judul'];
        $deskripsi   = $_POST['deskripsi'];
        $kategori_id = $_POST['kategori_id'];
        $tingkat     = $_POST['tingkat'];
        $gambar      = $_FILES['gambar']['tmp_name'];
        $nama_gambar = uniqid().'.png';

        $upload_file = move_uploaded_file($gambar, 'assets/img/'.$nama_gambar);

        if ($upload_file) {
            $req = [
                'judul' => $judul,
                'slug' => $helper->slug($judul),
                'deskripsi' => $deskripsi,
                'kategori_id' => $kategori_id,
                'tingkat' => $tingkat,
                'gambar' => $nama_gambar,
                'created_at' => date('Y-m-d')
            ];

            $id  = $kursus->tambahKursus($req);
            if ($id) {
                $helper->alert('sukses', 'Berhasil menambahkan data.', $session);
                header('Location:index.php?page=kursus&sub=add&id='.$id);
            }else {
                $helper->alert('gagal', 'Gagal menambahkan data.', $session);
                header('Location:index.php?page=kursus&sub=add');
            }
        }
    }

    if (isset($_POST['addMateri'])) {
        $id_kursus = $_POST['id_kursus'];
        $judul     = $_POST['judul'];
        $video_url = $_POST['video_url'];
        $durasi    = $_POST['durasi'];

        $req = [
            'id_kursus' =>$id_kursus,
            'judul' => $judul,
            'video_url' => $video_url,
            'durasi' => $durasi
        ];

        $tambah = $materi->tambah($req);

        if ($tambah) {
            $helper->alert('sukses', 'Berhasil menambahkan data.', $session);
            if ($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=add&id='.$id_kursus);
            }elseif($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=edit&id='.$id_kursus);
            }
        }else {
            $helper->alert('gagal', 'Gagal menambahkan data.', $session);
            if ($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=add&id='.$id_kursus);
            }elseif($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=edit&id='.$id_kursus);
            }
        }
    }
}elseif ($page == 'administrator') {
   if (isset($_POST['addAdmin'])) {
       $nama     = $_POST['nama'];
       $email    = $_POST['email'];
       $password = $_POST['password'];

       $tambah = $auth->register($nama, $email, $password);

       if ($tambah) {
            $helper->alert('sukses', 'Berhasil menambahkan data.', $session);
            header('Location:index.php?page=administrator');
        }else {
            $helper->alert('gagal', 'Gagal menambahkan data.', $session);
            header('Location:index.php?page=administrator');
        }
   }
}