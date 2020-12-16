function checkLogin() {
  var username = document.getElementById("username").value;
  var pwd = document.getElementById("pwd").value;
  var errUsername = document.getElementById("errUsername");
  var errPwd = document.getElementById("errPwd");

  var check = true;

  errUsername.innerHTML = "";
  errPwd.innerHTML = "";

  if (username === "") {
    check = false;
    errUsername.innerHTML = "Required";
  }
  if (pwd === "") {
    check = false;
    errPwd.innerHTML = "Required";
  }
  return check;
}

function checkRegister() {
  var username = document.getElementById("username").value;
  var pwd = document.getElementById("pwd").value;
  var rePwd = document.getElementById("rePwd").value;
  var avatar = document.getElementById("avatar").value;

  var gt = document.getElementsByName("gt");
  var hobby = document.getElementsByName("hobby[]");

  var check = true;

  var errUsername = document.getElementById("errUsername");
  var errPwd = document.getElementById("errPwd");
  var errRePwd = document.getElementById("errRePwd");
  var errAvatar = document.getElementById("errAvatar");
  var errGt = document.getElementById("errGt");
  var errHobby = document.getElementById("errHobby");

  errUsername.innerHTML = "";
  errPwd.innerHTML = "";
  errRePwd.innerHTML = "";
  errAvatar.innerHTML = "";
  errGt.innerHTML = "";
  errHobby.innerHTML = "";

  if (username === "") {
    check = false;
    errUsername.innerHTML = "Required";
  } else {
    var patterUsername = /^[A-Za-z][A-Za-z0-9]{5,14}$/;
    console.log(username);
    if (!patterUsername.test(username)) {
      check = false;
      errUsername.innerHTML =
        "Tên đăng nhập bắt đầu bằng chữ cái, dài từ 6 - 15 ký tự";
    }
  }

  if (pwd === "") {
    check = false;
    errPwd.innerHTML = "Required";
  } else {
    console.log(pwd);

    if (
      !/[A-Za-z]/.test(pwd) ||
      !/\d/.test(pwd) ||
      !/[A-Za-z0-9]{6,15}/.test(pwd) ||
      /\W/.test(pwd)
    ) {
      check = false;
      errPwd.innerHTML =
        "Mật khẩu phải có chữ và số, không có ký tự đặt biệt, dài từ 6 đến 15 ký tự";
    }
  }

  if (rePwd === "") {
    check = false;
    errRePwd.innerHTML = "Required";
  } else if (rePwd !== pwd) {
    check = false;
    errRePwd.innerHTML = "Nhập lại mật khẩu không đúng";
  }

  if (avatar === "") {
    check = false;
    errAvatar.innerHTML = "Required";
  }

  if (Array.from(gt).find((r) => r.checked === true) === undefined) {
    check = false;
    errGt.innerHTML = "Required";
  }

  if (Array.from(hobby).find((r) => r.checked === true) === undefined) {
    check = false;
    errHobby.innerHTML = "Required";
  }

  return check;
}

function checkExist(str) {
  if (str.length > 0) {
    var xmlReq = new XMLHttpRequest();

    xmlReq.onreadystatechange = () => {
      if (xmlReq.readyState == 4 && xmlReq.status == 200) {
        document.getElementById("errUsername").innerHTML = xmlReq.responseText
          ? xmlReq.responseText
          : "";
      }
    };

    xmlReq.open("GET", "/ct428/buoi3/process/isExistUser.php?u=" + str, true);
    xmlReq.send();
  }
}

function detailProduct(id) {
  var xmlReq = new XMLHttpRequest();

  xmlReq.onreadystatechange = () => {
    if (xmlReq.readyState == 4 && xmlReq.status == 200) {
      document.getElementById("detailProduct").innerHTML = xmlReq.responseText;
    }
  };

  xmlReq.open(
    "GET",
    "/ct428/buoi3/process/getDetailProduct.php?id=" + id,
    true
  );
  xmlReq.send();
}

function popupImage(id, x, y) {
  var xmlReq = new XMLHttpRequest();

  xmlReq.onreadystatechange = () => {
    if (xmlReq.readyState == 4 && xmlReq.status == 200) {
      if (xmlReq.responseText.length < 0) {
        return;
      }
      var image = xmlReq.responseText;
      console.log(x, y);
      var imgTag = document.getElementById("img-katy");
      imgTag.setAttribute("src", `/ct428//buoi3/img/product/${image}`);
      imgTag.style.top = y + "px";
      imgTag.style.left = x + 30 + "px";
    }
  };

  xmlReq.open(
    "GET",
    "/ct428/buoi3/process/getProductImage.php?idsp=" + id,
    true
  );
  xmlReq.send();
}

function handleSearch(str) {
  if (str.length > 0) {
    var xmlReq = new XMLHttpRequest();

    xmlReq.onreadystatechange = () => {
      if (xmlReq.readyState == 4 && xmlReq.status == 200) {
        if (xmlReq.responseText.length > 0) {
          var results = JSON.parse(xmlReq.responseText);
          document.getElementById("search-ul").innerHTML = "";
          results.forEach((value) => {
            var node = document.createElement("li");
            var text = document.createTextNode(value.tensp);
            node.appendChild(text);
            document.getElementById("search-ul").appendChild(node);
            // document.getElementById("search-ul"). =
            //   "<li>" + value.tensp + "</li>";
          });

          document
            .getElementsByClassName("sd-autocomplete-ul")[0]
            .setAttribute("style", "display: block;");
        }
      }
    };

    xmlReq.open("GET", "/ct428/buoi3/process/search.php?str=" + str, true);
    xmlReq.send();
  }
  document
    .getElementsByClassName("sd-autocomplete-ul")[0]
    .setAttribute("style", "display: none;");
  document.getElementById("search-ul").innerHTML = "";
}

var katyTD = document.getElementsByClassName("katy");

for (var i = 0; i < katyTD.length; i++) {
  katyTD[i].addEventListener(
    "mouseover",
    (e) => {
      popupImage(e.target.getAttribute("value"), e.clientX, e.clientY);
    },
    false
  );
}

for (var i = 0; i < katyTD.length; i++) {
  katyTD[i].addEventListener(
    "mouseout",
    (e) => {
      document.getElementById("img-katy").setAttribute("src", "");
    },
    false
  );
}
