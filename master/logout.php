<?php
session_start();

unset($_SESSION['admin-id']);
unset($_SESSION['admin-name']);
unset($_SESSION['admin-email']);
unset($_SESSION['admin-password']);

header('Location:index.php');