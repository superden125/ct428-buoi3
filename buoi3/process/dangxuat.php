<?php

    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);

    header('location: /ct428/buoi3/dangnhap.php');
?>