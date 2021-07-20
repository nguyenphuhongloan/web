<header class="header">
    <div class="topbar">
        <div class="grid">
            <div class="topbar_1">
                <div class="logo">
                    <a href="index.php">
                        <img src="modules/img/logo.png" alt="logo">
                        <p class="welcome-msg">Chào mừng bạn đến với Moza</p>
                    </a>
                </div>
                <ul class="topbar_2">
                    <?php
                    include("modules/admin/config.php");
                    if (isset($_SESSION['User'])) {
                        $sql = "SELECT tenkh FROM tbl_khachhang where taikhoan = '" . $_SESSION['User'] . "'";
                        $query = $connect->query($sql);
                        $row = $query->fetch_array();
                        echo "<li  id='loichao'> 
                                Xin chào " . $row['tenkh'] . "
                        </li>";
                    } else
                        echo "<li class='login' onclick='openmodal(`mymodal`)' id='login1'>
                            <i class='fas fa-edit'></i>
                                Đăng nhập
                        </li>";
                    ?>
                    <div class="modal" id="mymodal">
                        <div style="margin-top: 10%"></div>
                        <div class="modal-content">
                            <i class="fas fa-window-close" onclick="closemodal('mymodal')"></i>
                            <div class="form" id="form-2">
                                <h3 class="heading test">Đăng nhập</h3>
                                <div class="spacer"></div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="emailtk" name="email" type="text" placeholder="VD: email@gmail.com" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input id="passwordtk" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <input type="submit" name="dn" value="Đăng nhập" class="form-submit" onclick="dangnhap()">
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['User'])) {
                        echo "<a href = 'index.php?action=dangxuat' style='text-decoration:none;color: #909090;'><li id='dangxuat' class='registration'>
                                Đăng xuất
                            </li></a>";
                    } else {
                        echo "<li class='registration' onclick='openmodal(`mymodal1`)' id='registration1'>
                            <i class='fas fa-user'></i>
                            Đăng ký
                            </li>";
                    }
                    if (isset($_GET['action'])) {
                        if ($_GET["action"] == "dangxuat") {
                            unset($_SESSION['User']);
                            echo "<script>
                                location.href = 'index.php';
                            </script>";
                        }
                    }
                    ?>
                    <div class="modal" id="mymodal1">
                        <div class="modal-content">
                            <i class="fas fa-window-close" onclick="closemodal('mymodal1')"></i>
                            <div action="modules/action.php" class="form" id="form-1">
                                <div class="spacer"></div>

                                <div class="form-group">
                                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                                    <input id="fullname" name="fullname" type="text" placeholder="VD: Tuấn Hưng" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Địa chỉ</label>
                                    <input id="adress" name="adress" type="text" placeholder="VD: Quảng Trị" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Số điện thoại</label>
                                    <input id="sodt" name="sodt" type="text" placeholder="VD: 0397907777" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" name="email" type="text" placeholder="VD: email@gmail.com" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                                    <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <input type="submit" name="submit" class="form-submit" value="Đăng ký" onclick="dangky()">
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Mong muốn của chúng ta
                            Validator({
                                form: '#form-1',
                                formGroupSelector: '.form-group',
                                errorSelector: '.form-message',
                                rules: [
                                    Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
                                    Validator.isRequired('#email'),
                                    Validator.isEmail('#email'),
                                    Validator.isRequired('#password'),
                                    Validator.minLength('#password', 5),
                                    Validator.isRequired('#password_confirmation'),
                                    Validator.isConfirmed('#password_confirmation', function() {
                                        return document.querySelector('#form-1 #password').value;
                                    }, 'Mật khẩu nhập lại không chính xác')
                                ]
                            });
                            Validator({
                                form: '#form-2',
                                formGroupSelector: '.form-group',
                                errorSelector: '.form-message',
                                rules: [
                                    Validator.isRequired('#emailtk'),
                                    Validator.isEmail('#emailtk'),
                                    Validator.isRequired('#passwordtk'),
                                ]
                            });
                        });

                        function dangnhap() {
                            var tk = $("#emailtk").val();
                            var mk = $("#passwordtk").val();
                            $.post('modules/ajax.php', {
                                tk: tk,
                                mk: mk,
                                action: "login"
                            }, function(result) {
                                if (result == 1) {
                                    alert("Đăng nhập thành công");
                                    location.reload();
                                } else if (result == 2) {
                                    alert("Sai mật khẩu");
                                } else if (result == 3) {
                                    alert("Tài khoản đã bị khóa");
                                } else {
                                    alert("Tài khoản không tồn tại");
                                }
                            });
                        }

                        function dangky() {
                            var fullname = $("#fullname").val();
                            var diachi = $("#adress").val();
                            var sodt = $("#sodt").val();
                            var email = $("#email").val();
                            var pass = $("#password").val();
                            $.post('modules/ajax.php', {
                                fullname: fullname,
                                diachi: diachi,
                                sodt: sodt,
                                email: email,
                                pass: pass,
                                action: "register"
                            }, function(result) {
                                if (result == 0) {
                                    alert("Email đã được đăng ký rồi");
                                } else if (result == 1) {
                                    alert("Đăng ký thành công");
                                    location.reload();
                                }
                            });
                        }
                    </script>
                    <script src="modules/JS/validator.js"></script>

                    <li class="mini-cart" onclick="checkGiohang(),openTab(event, 'tranggiohang')">
                        <a href="index.php?action=giohang" style="text-decoration:none;color: blanchedalmond;">
                            <i class="fas fa-cart-plus"></i>
                            Giỏ hàng
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <nav id="navbar">
        <div class="grid">
            <div class="nav-all">
                <div class="nav">
                    <a href='index.php?action=homepage' class="nav-item active open" style="text-decoration:none;color: #fff;">Trang chủ</a>
                    <a href='index.php?action=gioithieu' class="nav-item open" style="text-decoration:none;color: #fff;color: #fff;">Giới thiệu</a>
                    <a href='index.php?action=product' class="nav-item open" style="text-decoration:none;color: #fff;">
                        Sản phẩm
                    </a>
                    <a href='index.php?action=contact' class="nav-item open" style="text-decoration:none;color: #fff;">Liên hệ</a>
                    <a class="nav-item open" href='index.php?action=history' style="text-decoration:none;color: #fff;">Lịch sử đặt hàng
                    </a>
                </div>
                <div class="nav-item-search">
                    <?php
                    if (isset($_GET['action'])) {
                        if ($_GET['action'] == "loai") {
                            $idloai = $_GET['loaisp'];
                            echo '<div class="header-search">
                            <input type="search" placeholder="Tìm kiếm sản phẩm..." class="input-search-text" id="textsearch">
                            <button class="icon-search" onclick="searchloai(' . $idloai . '),openTab(event, `mysearch`)" id="icon-search">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>';
                        } else {
                            echo '<div class="header-search">
                            <input type="search" placeholder="Tìm kiếm sản phẩm..." class="input-search-text" id="textsearch">
                            <button class="icon-search" onclick="search(),openTab(event, `mysearch`)" id="icon-search">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>';
                        }
                    } else {
                        echo '<div class="header-search">
                            <input type="search" placeholder="Tìm kiếm sản phẩm..." class="input-search-text" id="textsearch">
                            <button class="icon-search" onclick="search(),openTab(event, `mysearch`)" id="icon-search">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<script>
    function xoadau(str) {
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, "");
        str = str.replace(/ + /g, "");
        str = str.trim();
        return str;
    }

    function search() {
        var text = xoadau($("#textsearch").val());
        location.href = "index.php?action=search&text=" + text;
    }

    function searchloai(id) {
        var text = xoadau($("#textsearch").val());
        location.href = "index.php?action=search&text=" + text + "&loai=" + id;
    }
    function checkgia(){
        if(document.getElementById('giatren').value == "" || document.getElementById('giaduoi').value==""){
            return false;
        }
        if(isNaN(document.getElementById('giatren').value) || isNaN(document.getElementById('giaduoi').value)){
            return false;
        }
        return true;
    }
</script>