<?php
    if($_GET['str']){
        include "../config/db_connect.php";
        session_start();
        $str = $_GET['str'];
        $id = $_SESSION['user_id'];
        $sql = "select tensp from sanpham where tensp like '%$str%' and idtv = '$id'";

        $results = mysqli_query($conn, $sql);

        if(mysqli_num_rows($results) > 0){
            $products = mysqli_fetch_all($results, MYSQLI_ASSOC);

            echo json_encode($products);
        }

        mysqli_close($conn);
    }
?>