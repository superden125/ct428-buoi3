<?php
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $pwd = md5($_POST['pwd']);
        $gt = $_POST['gt'];
        $job = $_POST['job'];
        $hobby = $_POST['hobby'];
        $file = $_FILES['avatar'];
        
        $pathSave = "../img/user/" . $file['name'];
        $fileName = $file['name'];
        $hobbyStr = implode(",", $hobby);

        include("../config/db_connect.php");

        $sql = "insert into thanhvien (tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich) values ('$username', '$pwd', '$fileName', '$gt', '$job', '$hobbyStr')";

        if(mysqli_query($conn, $sql)){
            //$id = mysqli_insert_id($conn);
            move_uploaded_file($file['tmp_name'], $pathSave);
            mysqli_close($conn);            
            header("Location: ../dangnhap.php");
            
        }
        else{
            echo 'Query error: ' . mysqli_error($conn);
        }
        
    }
   
?>