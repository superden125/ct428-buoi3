<!-- <?php
    require('./process/isLogin.php');

    
    $isEdit = false;

    $idsp = "";
    $title = "";
    $desc = "";
    $price = "";
    $avatar = "";

    if(isset($_GET['idsp'])){
      $isEdit = true;
      $idsp = $_GET['idsp'];
      include("./config/db_connect.php");

      $sql = "select * from sanpham where idsp = $idsp";

      $result = mysqli_query($conn, $sql);
      $product = mysqli_fetch_assoc($result);

      mysqli_free_result($result);
      mysqli_close($conn);

      $title = $product['tensp'];
      $desc = $product['chitietsp'];
      $price = $product['giasp'];
      $avatar = $product['hinhanhsp'];
    }

?> -->

<!DOCTYPE html>
<html>
  <?php include("layout/header.php")?>
    <div class="sd-table-form">
    <h3><?php echo $isEdit ? 'Cập nhật sản phẩm' : "Thêm sản phẩm mới" ?></h3>
    <p>Vui lòng điền đầy đủ thông tin bên dưới để  thêm sản phẩm mới</p>
    
    <form
      action="process/themsp.php"
      method="POST"
      enctype="multipart/form-data"
    >
      <input type="hidden" name="idsp" value="<?php echo $idsp?>">
      <input type="hidden" name="isEdit" value="<?php echo $isEdit?>">
      <table>
        <tr>
          <td><label for="title">Tên sản phẩm</label></td>
          <td><input type="text" id="title" name="title" value="<?php echo $title?>"/></td>
        </tr>
        <tr>
          <td><label for="desc">Chi tiết sản phẩm</label></td>
          <td><textarea id="desc" name="desc" rows="5" cols="40"><?php echo $desc?></textarea></td>
        </tr>
        <tr>
          <td><label for="price">Giá sản phẩm</label></td>
          <td><input type="text" id="price" name="price" value="<?php echo $price?>"/>(VND)</td>
        </tr>
        <tr>
          <td><label for="avatar">Hình đại diện</label></td>
          <td><input type="file" id="avatar" name="avatar" /></td>
        </tr>
        
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Lưu sản phẩm" name="submit" />
            <input type="reset" value="Làm lại" />
          </td>
        </tr>
      </table>
    </form>
    </div>
  <?php include("layout/footer.php")?>
</html>
