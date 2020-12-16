<?php 
    if($_GET["u"]){

        include "../config/db_connect.php";

        $username = $_GET["u"];

        $sql = "select * from thanhvien where tendangnhap = '$username'";
        
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            echo "Username existed";
        }
        
        mysqli_close($conn);
    }
?>