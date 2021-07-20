<div class="left__content">
    <div class="left__logo">LOGO</div>
    <div class="left__profile">
        <div class="left__image"><img src="modulesad/img/profile.jpg" alt=""></div>
        <p class="left__name"><?php
                                include("./config.php");
                                $sql = "SELECT tennv FROM tbl_nhanvien WHERE tknv = '" . $_SESSION['admin'] . "'";
                                $query = mysqli_query($connect, $sql);
                                while ($row = $query->fetch_array()) {
                                    echo $row['tennv'];
                                }
                                ?></p>
    </div>
    <ul class="left__menu">


        <li class="left__menuItem">
            <a href="indexad.php?action=trangchuad" class="left__title"><img src="modulesad/img/icon-dashboard.svg" alt="">Dashboard</a>
        </li>
        <?php
        include("./config.php");
        $sql = "SELECT macv FROM tbl_nhanvien WHERE tknv = '" . $_SESSION['admin'] . "'";
        $query = mysqli_query($connect, $sql);
        while ($row = $query->fetch_array()) {
            $macv = $row["macv"];
            break;
        }
        $sql1 =  "SELECT * from tbl_quyenthuocchucvu where macv=$macv";
        $query1 = mysqli_query($connect, $sql1);
        while ($row1 = $query1->fetch_array()) {

            if ($row1['maquyen'] == 1) {
        ?>
                <li class="left__menuItem">
                    <div class="left__title"><img src="modulesad/img/icon-tag.svg" alt="">Sản Phẩm<img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                    <div class="left__text">
                        <a class="left__link" href="indexad.php?action=themsp">Thêm Sản Phẩm</a>
                        <a class="left__link" href="indexad.php?action=viewproduct">Xem Sản Phẩm</a>
                    </div>
                </li>
            <?php

            }
            if ($row1['maquyen'] == 2) {
            ?>
                <li class="left__menuItem">
                    <div class="left__title"><img src="modulesad/img/icon-edit.svg" alt="">Thể Loại <img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                    <div class="left__text">
                        <a class="left__link" href="indexad.php?action=themtl">Thêm Thể Loại</a>
                        <a class="left__link" href="indexad.php?action=theloai">Xem Thể Loại</a>
                    </div>
                </li><?php

                    }

                    if ($row1['maquyen'] == 3) {
                        ?>
                <li class="left__menuItem">
                    <a href="indexad.php?action=khachhang" class="left__title"><img src="modulesad/img/icon-users.svg" alt="">Khách Hàng</a>
                </li><?php

                    }
                    if ($row1['maquyen'] == 6) {
                        ?>
                <!-- <li class="left__menuItem">
                    <div class="left__title"><img src="modulesad/img/icon-edit.svg" alt="">Phiếu Nhập <img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                    <div class="left__text">
                        <a class="left__link" href="indexad.php?action=themphieunhap">Thêm Phiếu Nhập</a>
                        <a class="left__link" href="indexad.php?action=phieunhap">Xem Phiếu Nhập</a>
                    </div>
                </li> --><?php

                        }
                        if ($row1['maquyen'] == 5) {
                            ?>
                <li class="left__menuItem">
                    <a href="indexad.php?action=hoadon" class="left__title"><img src="modulesad/img/icon-book.svg" alt="">Đơn Đặt Hàng</a>
                </li><?php

                        }
                        if ($row1['maquyen'] == 6) {
                        ?>
                <li class="left__menuItem">
                    <div class="left__title"><img src="modulesad/img/icon-edit.svg" alt="">Chức Vụ <img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                    <div class="left__text">
                        <a class="left__link" href="indexad.php?action=themcv">Thêm Chức Vụ</a>
                        <a class="left__link" href="indexad.php?action=chucvu">Xem Chức Vụ</a>
                    </div>
                </li><?php

                        }
                        if ($row1['maquyen'] == 4) {
                        ?>
                <li class="left__menuItem">
                    <div class="left__title"><img src="modulesad/img/icon-user.svg" alt="">Nhân viên<img class="left__iconDown" src="modulesad/img/arrow-down.svg" alt=""></div>
                    <div class="left__text">
                        <a class="left__link" href="indexad.php?action=themnv">Thêm nhân viên</a>
                        <a class="left__link" href="indexad.php?action=nhanvien">Xem nhân viên</a>
                    </div>
                </li><?php

                        }
                        if ($row1['maquyen'] == 7) {
                        ?>
                <li class="left__menuItem">
                    <a href="indexad.php?action=thongke" class="left__title"><img src="modulesad/img/icon-users.svg" alt="">Thống Kê</a>
                </li><?php

                        }
                    }
                        ?>


        <li class="left__menuItem">
            <a href="indexad.php?action=dangxuat" class="left__title"><img src="modulesad/img/icon-logout.svg" alt="">Đăng Xuất</a>
        </li>
    </ul>
</div>
</div>
<?php
if (isset($_GET['action'])) {
    if ($_GET["action"] == "dangxuat") {

        unset($_SESSION['admin']);
        echo "<script> location.href = 'indexad.php';</script>";
    }
}

?>
<script>
    function xoadau(str) {
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, "");
        str = str.replace(/ + /g, "");
        str = str.trim();
        return str;
    }
</script>