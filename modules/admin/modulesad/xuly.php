<?php
include("../config.php");
if (isset($_POST["action"])) {
    if ($_POST["action"] == "themtl") {
        $tentl = $_POST["tl"];
        $sql = "INSERT INTO tbl_theloai(tentheloai) values ('$tentl')";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST["action"] == "themsp") {
        $tensp = $_POST["tensp"];
        $matheloai = $_POST["loaisp"];
        $gia = $_POST["gia"];
        $giathap = $_POST['giagiam'];
        $img = $_POST['img1'];
        $sql = "INSERT INTO tbl_sanpham(tensp, giaban, giakhuyenmai, matheloai, linkhinhanh) values ('$tensp','$giathap','$gia', '$matheloai', '$img')";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST["action"] == "cthoadon") {
        echo 1;
    } else if ($_POST["action"] == "themcv") {
        $cv = $_POST["cv"];
        $sql = "INSERT INTO tbl_chucvu(tencv) values ('$cv')";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST["action"] == "quyen") {
        $quyen = $_POST["quyen"];
        $sql = "INSERT INTO tbl_quyen(tenquyen) values ('$quyen')";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST["action"] == "quyencv") {
        echo 1;
    } else if ($_POST["action"] == "ttdh") {
        $ma = $_POST["ma"];
        $idhd = $_POST["idhd"];
        $sql = "UPDATE tbl_hoadon set trangthai='$ma' where mahd=$idhd";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST["action"] == "time") {
        $ngaydau = $_POST['ngaydau'];
        $ngaycuoi = $_POST['ngaycuoi'];
        $sql = "SELECT * from tbl_hoadon";
        $query = $connect->query($sql);
        $ngaydau = date_create("$ngaydau");
        $ngaydau = date_format($ngaydau, "Y-m-d 0:0:0");
        $ngaycuoi = date_create("$ngaycuoi");
        $ngaycuoi = date_format($ngaycuoi, "Y-m-d 23:59:59");
        while ($row = $query->fetch_array()) {
            $ngay = $row["ngayban"];
            $ngay = date_create("$ngay");
            $ngay = date_format($ngay, "Y-m-d");
            if (strtotime($ngaydau) < strtotime($ngay) && strtotime($ngay) < strtotime($ngaycuoi))
                $result['items'][] = $row;
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($result);
    } else if ($_POST["action"] == "edkh") {
        $tenkh = $_POST['tenkh'];
        $edemail = $_POST['edemail'];
        $edsdt = $_POST['edsdt'];
        $eddc = $_POST['eddc'];
        $edpass = $_POST['edpass'];
        $id = $_POST['id'];
        $sql = "UPDATE tbl_khachhang SET tenkh='$tenkh', diachi='$eddc', taikhoan='$edemail', sdt='$edsdt', matkhau='$edpass' WHERE makh=$id";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST["action"] == "themnv") {
        $tennv = $_POST['tennv'];
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['pass'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $chucvu = $_POST['chucvu'];
        $matkhau = md5($matkhau);
        $sql = "INSERT INTO tbl_nhanvien(tennv,sdt,tknv,mknv,trangthai,macv,diachi) values ('$tennv','$sdt','$taikhoan', '$matkhau', 1,'$chucvu','$diachi')";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST["action"] == "ednv") {
        $edtennv = $_POST['edtennv'];
        $edtaikhoan = $_POST['edtaikhoan'];
        $edmatkhau = $_POST['edmatkhau'];
        $edsdt = $_POST['edsdt'];
        $eddiachi = $_POST['eddiachi'];
        $edchucvu = $_POST['edchucvu'];
        $edmatkhau = md5($edmatkhau);
        $id = $_POST['id'];
        $sql = "UPDATE tbl_nhanvien set tennv='$edtennv',sdt='$edsdt',tknv='$edtaikhoan',mknv='$edmatkhau',trangthai=1,macv='$edchucvu',diachi='$eddiachi' where manv=$id";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST['action'] == "xoatheomacv") {
        $macv = $_POST['macv'];
        $sql = "DELETE FROM tbl_quyenthuocchucvu WHERE macv = $macv";
        $query = mysqli_query($connect, $sql);
    } else if ($_POST['action'] == "capnhatquyen") {
        $macv = $_POST['macv'];
        $quyen = $_POST['quyen'];
        $sql = "INSERT INTO tbl_quyenthuocchucvu VALUES('$macv','$quyen')";
        $query = mysqli_query($connect, $sql);
        echo 1;
    } else if ($_POST['action'] == "blockkh") {
        $makh = $_POST['makh'];
        $check = $_POST['check'];
        $sql = "UPDATE tbl_khachhang SET trangthai = '$check' WHERE makh='$makh'";
        $query = mysqli_query($connect, $sql);
        echo $check;
    } else if ($_POST['action'] == "ansp") {
        $masp = $_POST['masp'];
        $check = $_POST['check'];
        $sql = "UPDATE tbl_sanpham SET trangthai = '$check' WHERE masp='$masp'";
        $query = mysqli_query($connect, $sql);
        echo $check;
    } else if ($_POST['action'] == "blocknv") {
        $makh = $_POST['manv'];
        $check = $_POST['check'];
        $sql = "UPDATE tbl_nhanvien SET trangthai = '$check' WHERE manv='$makh'";
        $query = mysqli_query($connect, $sql);
        echo $check;
    }
}
