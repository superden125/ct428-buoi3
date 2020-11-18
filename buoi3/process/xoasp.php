<?php
    include('../config/db_connect.php');
    session_start();
    if(isset($_GET['idsp'])){
        $idsp = $_GET['idsp'];

        $sql = "select * from sanpham where idsp = $idsp and idtv = ".$_SESSION['user_id']."";

        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
        $fileName = $product['hinhanhsp'];
        mysqli_free_result($result);

        $sql = "delete from sanpham where idsp = $idsp and idtv = ".$_SESSION['user_id']."";
        
        if(mysqli_query($conn, $sql)){
            $path = "../img/product/" . $fileName;
            if(is_file($path)){
                unlink($path);
            }
            header('location: ../danhsachsp.php');
        }
        else{
            echo 'Query error:' . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>