<?php

if ($page == 'kategori') {
    if (isset($_POST['delKategori'])) {
        $hapus = $kategori->hapus($_POST['id']);

        if ($hapus) {
            $helper->alert('sukses', 'Berhasil menghapus data.', $session);
            header('Location:index.php?page=kategori');
        }else {
            $helper->alert('gagal', 'Gagal menghapus data.', $session);
            header('Location:index.php?page=kategori');
        }
    }
}elseif ($page == 'kursus') {
    if (isset($_POST['delMateri'])) {
        $id        = $_POST['id'];
        $id_kursus = $_POST['id_kursus'];

        $hapus = $materi->hapus($id);

        if ($hapus) {
            $helper->alert('sukses', 'Berhasil menghapus data.', $session);
            if ($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=add&id='.$id_kursus);
            }elseif($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=edit&id='.$id_kursus);
            }
        }else {
            $helper->alert('gagal', 'Gagal menghapus data.', $session);
            if ($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=add&id='.$id_kursus);
            }elseif($sub_page == 'add') {
                header('Location:index.php?page=kursus&sub=edit&id='.$id_kursus);
            }
        }
    }

    if (isset($_POST['delKursus'])) {
        $hapus = $kursus->hapus($_POST['id']);

        if ($hapus) {
            $helper->alert('sukses', 'Berhasil menghapus data.', $session);
            header('Location:index.php?page=kursus');
        }else {
            $helper->alert('gagal', 'Gagal menghapus data.', $session);
            header('Location:index.php?page=kursus');
        }
    }
}elseif ($page == 'peserta') {
    if (isset($_POST['delPeserta'])) {
        $id = $_POST['id'];

        $hapus = $peserta->hapus($id);

        if ($hapus) {
            $helper->alert('sukses', 'Berhasil menghapus data.', $session);
            header('Location:index.php?page=peserta');
        }else {
            $helper->alert('gagal', 'Gagal menghapus data.', $session);
            header('Location:index.php?page=peserta');
        }
    }
}elseif ($page == 'administrator') {
    if (isset($_POST['delAdmin'])) {
        $id = $_POST['id'];

        $hapus = $admin->hapus($id);

        if ($hapus) {
            $helper->alert('sukses', 'Berhasil menghapus data.', $session);
            header('Location:index.php?page=administrator');
        }else {
            $helper->alert('gagal', 'Gagal menghapus data.', $session);
            header('Location:index.php?page=administrator');
        }
    }
}