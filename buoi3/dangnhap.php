<!DOCTYPE html>
<html lang="en">
<?php include("layout/header.php")?>

<div class="sd-container-login">
    <h2>Đăng Nhập</h2>
    
    <form action="process/dangnhap.php" class="sd-form-login" method="POST">
        <div class="sd-form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="sd-form-control"/>
        </div>
        <div class="sd-form-group">
            <label for="pwd">Mật khẩu</label>
            <input type="password" name="pwd" id="pwd" class="sd-form-control"/>
        </div>
        <div class="sd-form-group">
            <input type="submit" value="Đăng Nhập" name="submit">            
        </div>        
    </form>
    
    
        
        
    
</div>

    
<?php include("layout/footer.php")?>
</html>