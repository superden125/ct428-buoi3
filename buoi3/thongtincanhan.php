<?php

    require('./process/isLogin.php');

    include("./config/db_connect.php");

    $id = $_SESSION['user_id'];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $sql = "select * from thanhvien where id = $id";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php include("layout/header.php")?>

<div class="sd-user">
    <?php if($user) {?>
        <h2>Chào bạn <?php echo $user['tendangnhap']?></h2>
        <img src="<?php echo "/ct428/buoi3/img/user/".$user["hinhanh"]?>" alt="">
        <div class="sd-user-detail">            
            <p>Nickname: <?php echo $user["tendangnhap"]?></p>
            <p>Giới tính: <?php echo $user["gioitinh"]?></p>
            <p>Nghề nghiệp: <?php echo $user["nghenghiep"]?></p>
            <p>Sở thích: <?php echo $user["sothich"]?></p>
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