<!DOCTYPE html>
<html lang="en">
<?php include("layout/header.php")?>

<div class="sd-container-login">
    <h2>Đăng Nhập</h2>
    
    <form action="process/dangnhap.php" onsubmit="return checkLogin()" class="sd-form-login" method="POST">
        <div class="sd-form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="sd-form-control"/>
            <span id="errUsername"></span>
        </div>
        <div class="sd-form-group">
            <label for="pwd">Mật khẩu</label>
            <input type="password" name="pwd" id="pwd" class="sd-form-control"/>
            <span id="errPwd"></span>
        </div>
        <div class="sd-form-group">
            <input type="submit" value="Đăng Nhập" name="submit">            
        </div>    
        <a href="/ct428/buoi3/dangky.php" class="sd-link">Đăng Ký</a>    
    </form>
    
    
        
        
    
</div>

    
<?php include("layout/footer.php")?>
</html>