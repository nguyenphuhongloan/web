<style>
  #dangnhap {
    /* FIX: thêm css, thêm hình vào thư mục img */
    background-image: url(../img/79254498_276054533619258_6221464550875140588_n.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    padding-top: 40px;
    padding-bottom: 162px;
    box-sizing: border-box;
  }

  .dangki1 {
    color: azure;
    background: none;
    width: 50%;
    outline: none;
    border: none;
    height: 40px;
    border-bottom: azure 1px solid;
    margin-bottom: 20px;
    text-align: left;
  }

  .login {
    background: #ff3366;
    color: #FFF;
    font-size: 26px;
    padding: 0.3em 1.2em;
    width: 50%;
    cursor: pointer;
  }

  .dangki1::placeholder {
    color: azure;
  }

  * {
    margin: 0;
    padding: 0;
  }
</style>
<form action="modulesad/xulydn.php" method="post">
  <div id="dangnhap" class="container">
    <section style="margin-top: 140px; " align="center">
      <h1 style="color: azure;font-size: 66px;margin-bottom: 50px;">ĐĂNG NHẬP ADMIN</h1>
      <input id="ten" class="dangki1" name="name" type="text" placeholder="Tên đăng nhập" autocomplete="off"><br>
      <input id="pass" class="dangki1" name="pass" type="password" placeholder="Mật khẩu"><br>
      <br>
      <button id="nutdn" class="login"> Đăng nhập</button>
    </section>
  </div>
</form>
<?php
  session_start();
  unset($_SESSION['admin']);
  if (isset($_SESSION['thongbaodn'])) {
    if($_SESSION['thongbaodn']==0){
    echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
    unset($_SESSION['thongbaodn']);
  }
  else  if($_SESSION['thongbaodn']==2){
      echo "<script>alert('Tài khoản của bạn đã bị khóa')</script>";
      unset($_SESSION['thongbaodn']);
    }
  }
?>
