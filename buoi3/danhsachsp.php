<?php

    require('./process/isLogin.php');

    include("./config/db_connect.php");

    
    $username = $_SESSION['username'];
    $id = $_SESSION['user_id'];
    $sql = "select * from sanpham where idtv = '$id'";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php include("layout/header.php")?>

<div class="sd-products">
    <h2 class="sd-text-red-top">Chào bạn <?php echo $username?></h2>
    <div class="sd-products-wrap">
        <p>Danh sách sản phẩm của bạn là</p>
        <table class="sd-table">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th colspan="3">Lựa chọn</th>
            </tr>
            
            <?php foreach($products as $index => $product){?>
                <tr>
                    <td><?php echo $index+1?></td>
                    <td><?php echo $product['tensp'];?></td>
                    <td><?php echo $product['giasp'];?> (VND)</td>
                    <td><a href="/ct428/buoi3/chitietsp.php?idsp=<?php echo $product['idsp']?>">Xem chi tiết</a></td>
                    <td><a href="/ct428/buoi3/themsp.php?idsp=<?php echo $product['idsp']?>"><img class="sd-icon" src="/ct428/buoi3/img/icon/edit.png" alt=""></a></td>
                    <td><a href="/ct428/buoi3/process/xoasp.php?idsp=<?php echo $product['idsp']?>"><img class="sd-icon" src="/ct428/buoi3/img/icon/delete.png" alt=""></a></td>
                </tr>
            <?}?>
        </table>
        <a href="/ct428/buoi3/process/dangxuat.php"><button class="sd-btn sd-btn-dx sd-btn-products-dx">Đăng xuất</button></a>
    </div>
    
    
</div>
    
<?php include("layout/footer.php")?>
</html>