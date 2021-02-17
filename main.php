<?php

$page = (isset($_GET['page']) ? $_GET['page'] : false);

require_once('vendor/autoload.php');
require_once('master/func/Session.php');
require_once('config/DB.php');
require_once('func/Home.php');
require_once('func/Detail.php');
require_once('func/Auth.php');
require_once('func/KelasSaya.php');
require_once('func/Profil.php');
require_once('func/Kategori.php');
require_once('func/Helper.php');

$session     = new Session();
$auth        = new Auth($session);
$home        = new Home();
$detail      = new Detail();
$kls_saya    = new KelasSaya();
$profil      = new Profil();
$kategori    = new Kategori();
$helper      = new Helper();

$isLogin = $auth->isLogin();
$uri     = explode('/', $_SERVER['REQUEST_URI']);
$uri     = end($uri);
