<?php
session_start();
$id = $_POST['idsp'];
if (empty($_FILES["img1"]) == true) {
    echo "rong";
} else if (isset($_POST["submit"]) && !empty($_FILES["img1"])) {
    $target_dir = "../../img/";
    $target_file = $target_dir . basename($_FILES["img1"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="") {
        $_SESSION['thongbao'] = 0;
        //header("Location: ../indexad.php?action=suasp?id=$id");
    } 
    else if($imageFileType!=""){
        if (move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file)) {
            $_SESSION['thongbao'] = 1;
            $id = $_POST['idsp'];
            $tensp = $_POST['tensp'];
            $gia = $_POST['gia'];
            $giagoc = $_POST['giagoc'];
            $hinhanh = $_FILES["img1"]["name"];
            $mota = $_POST['mota'];
            $loaisp = $_POST['loaisp'];
            include("../config.php");
            $sql =  "UPDATE tbl_sanpham SET tensp = '$tensp' , giaban = '$gia' , matheloai='$loaisp', linkhinhanh = '$hinhanh', mota = '$mota' WHERE masp  = $id";
            $query = mysqli_query($connect, $sql);
            echo $_SESSION['thongbao'];
            header("Location: ../indexad.php?action=viewproduct");
        } else {
            $_SESSION['thongbao'] = 2;
            header("Location: ../indexad.php?action=suasp?id=$id");
        }
    } else if ($imageFileType == ""){
        $_SESSION['thongbao'] = 1;
        $id = $_POST['idsp'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $giagoc = $_POST['giagoc'];
        $mota = $_POST['mota'];
        $loaisp = $_POST['loaisp'];
        $soluong = $_POST['soluong'];
        include("../config.php");
        $sql =  "UPDATE tbl_sanpham SET tensp = '$tensp', soluong = '$soluong' , giaban = '$gia', giakhuyenmai = '$giagoc' , matheloai='$loaisp', mota = '$mota' WHERE masp  = $id";
        $query = mysqli_query($connect, $sql);
        header("Location: ../indexad.php?action=viewproduct");
    }
} else {
    $_SESSION['thongbao'] = -999;
    header("Location: ../indexad.php?action=suasp?id=$id");
}
