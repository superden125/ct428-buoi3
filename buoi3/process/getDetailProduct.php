<?php
    if($_GET['id']){
        $id = $_GET['id'];

        include "../config/db_connect.php";

        $sql = "select * from sanpham where idsp = $id";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);

        echo "<div class='sd-user'>
                                 
                    <img src='/ct428/buoi3/img/product/".$product['hinhanhsp']."' alt=''>
                    <div class='sd-user-detail'>            
                        <p>".$product['tensp']."</p>
                        <p>Mô tả: ".$product['chitietsp']."</p>
                        <p>Giá: ".$product['giasp']." (VND)</p>
                    </div>
                    
            
        
            </div>";

    }
?>