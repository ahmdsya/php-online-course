<?php

$page     = (isset($_GET['page']) ? $_GET['page'] : false);
$sub_page = (isset($_GET['sub']) ? $_GET['sub'] : false);

require_once('../vendor/autoload.php');

require_once('../config/DB.php');
require_once('func/Session.php');
require_once('func/Auth.php');
require_once('func/Helper.php');
require_once('func/Kategori.php');
require_once('func/Kursus.php');
require_once('func/Materi.php');
require_once('func/Peserta.php');
require_once('func/Administrator.php');
require_once('func/Profil.php');
require_once('func/Dashboard.php');

$session  = new Session();
$auth     = new Auth($session);
$helper   = new Helper();
$kategori = new Kategori();
$kursus   = new Kursus();
$materi   = new Materi();
$peserta  = new Peserta();
$admin    = new Administrator();
$profil   = new Profil();
$dash     = new Dashboard();

require_once('proses/tambah.php');
require_once('proses/ubah.php');
require_once('proses/hapus.php');

$isLogin = $auth->isLogin();