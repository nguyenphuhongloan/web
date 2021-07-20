<?php
if (isset($_GET["action"])) {
    if ($_GET["action"] == "trangchuad") {
        include("giaodienad/trangchuad.php");
    } else if ($_GET["action"] == "viewproduct") {
        include("giaodienad/viewproduct.php");
    } else if ($_GET["action"] == "khachhang") {
        include("giaodienad/khachhang.php");
    } else if ($_GET["action"] == "theloai") {
        include("giaodienad/theloai.php");
    } else if ($_GET["action"] == "hoadon") {
        include("giaodienad/hoadon.php");
    } else if ($_GET["action"] == "themsp") {
        include("giaodienad/themsp.php");
    } else if ($_GET["action"] == "themtl") {
        include("giaodienad/themtl.php");
    } else if ($_GET["action"] == "cthoadon") {
        include("giaodienad/cthoadon.php");
    } else if ($_GET["action"] == "chucvu") {
        include("giaodienad/chucvu.php");
    } else if ($_GET["action"] == "themcv") {
        include("giaodienad/themcv.php");
    } else if ($_GET["action"] == "quyen") {
        include("giaodienad/quyen.php");
    } else if ($_GET["action"] == "themquyen") {
        include("giaodienad/themquyen.php");
    } else if ($_GET["action"] == "quyencv") {
        include("giaodienad/quyencv.php");
    } else if ($_GET["action"] == "suasp") {
        include("giaodienad/suasp.php");
    } else if ($_GET["action"] == "editkh") {
        include("giaodienad/editkhachhang.php");
    } else if ($_GET["action"] == "nhanvien") {
        include("giaodienad/nhanvien.php");
    } else if ($_GET["action"] == "themnv") {
        include("giaodienad/themnv.php");
    } else if ($_GET["action"] == "editnv") {
        include("giaodienad/editnv.php");
    } else if ($_GET["action"] == "ctchucvu") {
        include("giaodienad/ctchucvu.php");
    }else if ($_GET["action"] == "phieunhap") {
        include("giaodienad/phieunhap.php");
    }else if ($_GET["action"] == "ctphieunhap") {
        include("giaodienad/ctphieunhap.php");
    }else if($_GET["action"] == "themphieunhap"){
        include("giaodienad/themphieunhap.php");
    } else if ($_GET["action"] == "thongke") {
        include("giaodienad/thongke.php");
    } else if ($_GET["action"] == "thongkeloai") {
        include("giaodienad/thongkeloai.php");
    }
} else {
    include("giaodienad/trangchuad.php");
}
