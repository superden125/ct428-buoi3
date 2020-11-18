<?php
    session_start();
    $username = $pwd = "";
    if(isset($_POST['submit'])){

        include("../config/db_connect.php");

        $username = $_POST['username'];
        $pwd = md5($_POST['pwd']);
        

        $sql = "select * from thanhvien where tendangnhap= '$username'"
                . " and matkhau = '$pwd'";
        
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if($user['tendangnhap']){            
            mysqli_free_result($result);
            mysqli_close($conn);
            $id=$user['id'];
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $user['tendangnhap'];
            header("Location: ../thongtincanhan.php");
        }
        else{
            mysqli_free_result($result);
            mysqli_close($conn);
            header("Location: ../dangnhap.php");
        }

    }
?>