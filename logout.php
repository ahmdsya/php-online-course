<?php
session_start();

unset($_SESSION['user-id']);
unset($_SESSION['user-name']);
unset($_SESSION['user-email']);
unset($_SESSION['user-password']);

header('Location:index.php');