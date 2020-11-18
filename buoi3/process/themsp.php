<?php
    
    if(isset($_POST['submit'])){

        session_start();
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $file = $_FILES['avatar'];
        
        $fileName = $file['name'];
        
        include("../config/db_connect.php");

        
        if(($_POST['isEdit']==true)){
            if($fileName !== ""){
                $sql = "select * from sanpham where idsp = ".$_POST['idsp'];
                $result = mysqli_query($conn, $sql);
                $product = mysqli_fetch_assoc($result);
                $oldFileName = $product['hinhanhsp'];
                $path = "../img/product/".$oldFileName;

                if(is_file($path)){
                    unlink($path);
                }

                $sql = "update sanpham set tensp = '$title', chitietsp='$desc', giasp='$price', hinhanhsp='$fileName' where idsp=".$_POST['idsp']."";    
            }
            else{
                $sql = "update sanpham set tensp = '$title', chitietsp='$desc', giasp='$price' where idsp=".$_POST['idsp']."";
            }
        }
        else{
            $sql = "insert into sanpham (tensp, chitietsp, giasp, hinhanhsp, idtv) values ('$title', '$desc', $price, '$fileName', '".$_SESSION['user_id']."')";
        }
        
        
        
        if(mysqli_query($conn, $sql)){
            $pathFile = '../img/product/' . $fileName;             
            move_uploaded_file($file['tmp_name'], $pathFile);
            mysqli_close($conn);            
            header("Location: ../danhsachsp.php");
            
        }
        else{
            echo 'Query error: ' . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
   
?>