<?php

    require('./process/isLogin.php');

    include("./config/db_connect.php");

    $idtv = $_SESSION['user_id'];
    if(isset($_GET['idsp'])){
        $idsp = $_GET['idsp'];
    }
    $sql = "select * from sanpham where idtv = $idtv and idsp = $idsp";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php include("layout/header.php")?>

<div class="sd-user">
    <?php if($product) {?>
        
        <img src="<?php echo "/ct428/buoi3/img/product/".$product["hinhanhsp"]?>" alt="">
        <div class="sd-user-detail">            
            <p><?php echo $product["tensp"]?></p>
            <p>Mô tả: <?php echo $product["chitietsp"]?></p>
            <p>Giá: <?php echo $product["giasp"]. "(VND)"?></p>
            
            <a href="/ct428/buoi3/process/dangxuat.php"><button class="sd-btn sd-btn-dx sd-btn-userinfo">Đăng xuất</button></a>
            
        </div>
        <ul>
            <li><a href="/ct428/buoi3/danhsachsp.php">Danh sách sản phẩm</a></li>
            <li><a href="/ct428/buoi3/themsp.php">Thêm sản phẩm</a></li>
            <li><a href="/ct428/buoi3/thongtincanhan.php">Thông tin cá nhân</a></li>
        </ul>
    <?php }?>
    
</div>
    
<?php include("layout/footer.php")?>
</html>