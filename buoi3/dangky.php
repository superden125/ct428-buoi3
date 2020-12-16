<!DOCTYPE html>
<html>
  <?php include("layout/header.php")?>

  
  <div class="sd-table-form">
    <h3>Đăng ký tài khoản mới</h3>
    <p>Vui lòng điền đầy đủ thông tin bên dưới để đăng ký tài khoản mới</p>
    
    <form
      action="process/dangky.php"
      onsubmit="return checkRegister()"
      method="POST"
      enctype="multipart/form-data"
    >
      <table>
        <tr>
          <td><label for="username">Tên đăng nhập</label></td>
          <td>
          <input type="text" id="username" name="username" onblur="checkExist(this.value)"/>
          <span id="errUsername"></span>
          </td>
        </tr>
        <tr>
          <td><label for="pwd">Mật khẩu</label></td>
          <td>
            <input type="password" id="pwd" name="pwd" />
            <span id="errPwd"></span>
          </td>
        </tr>
        <tr>
          <td><label for="rePwd">Gõ lại mật khẩu</label></td>
          <td>
            <input type="password" id="rePwd" name="rePwd" />
            <span id="errRePwd"></span>
          </td>
        </tr>
        <tr>
          <td><label for="avatar">Ảnh đại diện</label></td>
          <td>
            <input type="file" id="avatar" name="avatar" />
            <span id="errAvatar"></span>  
          </td>
        </tr>
        <tr>
          <td><label>Giới tính</label></td>
          <td>
            <input type="radio" id="male" name="gt" value="nam" />
            <label for="male">Nam</label>
            <input type="radio" id="female" name="gt" value="Nữ" />
            <label for="female">Nữ</label>
            <input type="radio" id="other" name="gt" value="Khác" />
            <label for="other">Khác</label>
            <span id="errGt"></span>
          </td>
        </tr>
        <tr>
          <td><label>Nghề nghiệp</label></td>
          <td>
            <select name="job" id="job">
              <option value="Học sinh">Học sinh</option>
              <option value="Sinh viên">Sinh viên</option>
              <option value="Giáo viên">Giáo viên</option>
              <option value="Khác">Khác</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label>Sở thích</label></td>
          <td>
            <input type="checkbox" id="tt" name="hobby[]" value="Thể thao" />
            <label for="tt">Thể thao</label>
            <input type="checkbox" id="dl" name="hobby[]" value="Du lịch" />
            <label for="dl">Du lịch</label>
            <input type="checkbox" id="an" name="hobby[]" value="Âm nhạc" />
            <label for="an">Âm nhạc</label>
            <br />
            <input type="checkbox" id="ttr" name="hobby[]" value="Thời trang" />
            <label for="ttr">Thời trang</label>

            <span id="errHobby"></span>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Đăng ký" name="submit" />
            <input type="reset" value="Làm lại" />
            <!-- <button onclick="test(this)">Test</button> -->
          </td>
        </tr>
      </table>
    </form>
    </div>
  <?php include("layout/footer.php")?>
</html>
