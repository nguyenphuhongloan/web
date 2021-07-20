<?php
session_start();
if (empty($_FILES["img1"]) == true) {
    echo "rong";
} else if (isset($_POST["submit"]) && !empty($_FILES["img1"])) {
    $target_dir = "../../img/";
    $target_file = $target_dir . basename($_FILES["img1"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "") {
        // đuôi file k phải ảnh
        echo 0;
        $_SESSION['thongbao'] = 0;
        header("Location: ../indexad.php?action=themsp");
    } else if (move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file)) {
        echo 1; //ok
        $_SESSION['thongbao'] = 1;
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $giagoc = $_POST['giagoc'];
        $hinhanh = $_FILES["img1"]["name"];
        $mota = $_POST['mota'];
        $loaisp = $_POST['loaisp'];
        $soluong = $_POST['soluong'];
        include("../config.php");
        $sql =  "INSERT INTO tbl_sanpham(tensp,giaban,giakhuyenmai,soluong,matheloai,trangthai,mota,linkhinhanh) values ('$tensp','$gia','$giagoc','$soluong','$loaisp',1,'$mota','$hinhanh')";
        $query = mysqli_query($connect, $sql);
        echo $_SESSION['thongbao'];
        header("Location: ../indexad.php?action=viewproduct");
    } else {
        echo 3; //ko di chuyển dc
        $_SESSION['thongbao'] = 2;
        header("Location: ../indexad.php?action=themsp");
    }
} else {
    $_SESSION['thongbao'] = -999;
    header("Location: ../indexad.php?action=themsp");
}
