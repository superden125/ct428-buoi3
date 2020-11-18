<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header('location: /ct428/buoi3/dangnhap.php');
    }
?>