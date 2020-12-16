<?php
    if($_GET['idsp']){
        $idsp = $_GET['idsp'];

        include "../config/db_connect.php";

        $sql = "select * from sanpham where idsp = $idsp";

        $result = mysqli_query($conn, $sql);

        $product = mysqli_fetch_assoc($result);

        echo $product['hinhanhsp'];

        mysqli_close($conn);
    }
?>