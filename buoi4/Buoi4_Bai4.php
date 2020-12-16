<?php
    require('../buoi3/process/isLogin.php');

    include('../buoi3/config/db_connect.php');

    $id = $_SESSION["user_id"];
    $sql = "select * from sanpham where idtv = '$id'";
    
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
?>

<!DOCTYPE html>
<html>
<head> 
	<title> Lập trình web (CT428) </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="index.css" />

</head>	
<body>
<div id="wrap">
	<div id="title">
		<h1>Bài 2 - Buổi 4</h1>
	</div> <!--end div title-->
	<div id="menu">
		<!-- chèn menu của sinh viên vào-->
	</div> <!--end div menu-->
	<div id="content">
		<!--Nội dung trang web-->
		<h1>Slide show</h1>
	
		<form>
			<img id="laptopImg" src="/ct428/buoi3/img/product/<?php echo $products[0]["hinhanhsp"]?>" height="300" width="300" />
			<br/>
			<input type="button" name="previous" value="Previous" onclick="changeSlide(-1)">
			<input type="button" name="next" value="Next" onclick="changeSlide(1)">
			<br/>
			<select name="laptopSel" onchange="chooseSlide(value)">
                <?php foreach($products as $key => $value){?>
                    <option value=<?php echo $key?>><?php echo $value["tensp"]?></option>
                <?php }?>
			</select> 
		</form>
		
	</div> <!--end div content-->
	<div id="footer">
		<p>Họ tên SV: Triệu Đức Minh - B1704835<br/> Email: minhb1704835@student.ctu.edu.vn</p>
	</div> <!--end div footer-->
</div> <!--end div wrap-->

<div class="sd-hidden">
    <?php foreach($products as $value){?>
        <span class="name-img"><?php echo $value["hinhanhsp"]?></span>
    <?php }?>
</div>

<script>
    
    //var images = ["hp.jpg", "dell.jpg", "acer.jpg", "asus.jpg"];
    var images = document.getElementsByClassName("name-img");
    console.log(images[0].outerText);
      var dir = "/ct428/buoi3/img/product/";
      var index = 0;
	function changeSlide(pos) {
	
		index = index + pos;
		index = index < 0 ? images.length -1 : index;
		index = index > images.length - 1 ? 0 : index;
        document.getElementById("laptopImg").src = dir + images[index].outerText;
	
	}
	
	function chooseSlide(pos) {
	
	document.getElementById("laptopImg").src = dir + images[pos].outerText;
	}
		
	//-->
	</script>
</body>
</html>