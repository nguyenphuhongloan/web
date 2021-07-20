<?php
session_start();
include("action.php");
function phantrang($min){
        include("admin/config.php");
        return mysqli_query($connect,"SELECT * FROM tbl_sanpham  where trangthai = 1 limit $min,6");
}
function phantrangloai($min, $loai)
{
    include("admin/config.php");
    return mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE matheloai = $loai and trangthai = 1 limit $min,6 ");
}
function phantrangsearch($min, $search)
{
    include("admin/config.php");
    return mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE tensp LIKE N'%$search%'  and trangthai = 1  limit $min,6");
}
function phantrangsearchloai($min, $search, $loai)
{
    include("admin/config.php");
    return mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE tensp LIKE N'%$search%' AND matheloai = $loai and trangthai = 1 limit $min,6 ");
}
function phantranggia($min, $giathap, $giacao, $search, $loai, $sql)
{
    include("admin/config.php");
    //return "SELECT * FROM tbl_sanpham WHERE giaban>=$giathap and giaban<=$giacao and tensp LIKE $search AND matheloai = $loai and trangthai = 1 limit $min,6 ";
    return mysqli_query($connect, "SELECT * FROM tbl_sanpham WHERE giaban>=$giathap and giaban<=$giacao and tensp LIKE $search AND matheloai = $loai and trangthai = 1 limit $min,6 ");
}
if(isset($_POST["action"])){
    if($_POST["action"]=="login"){
        $a = new action();
        echo  $a->dangnhap($_POST["tk"],$_POST["mk"]);
    }else if($_POST["action"]=="phantrang"){
        $min = intval($_POST["sotrang"])*6-6;
        $query=phantrang($min);
        while($row=mysqli_fetch_array($query)){
            $result['items'][]=$row;
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($result);
    } else if ($_POST["action"] == "phantrangsearch") {
        $min = intval($_POST["sotrang"]) * 6 - 6;
        $search = $_POST["search"];
        $query = phantrangsearch($min, $search);
        while ($row = mysqli_fetch_array($query)) {
            $result['items'][] = $row;
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($result);
    } else if ($_POST["action"] == "phantrangsearchloai") {
        $min = intval($_POST["sotrang"]) * 6 - 6;
        $loai = $_POST["loai"];
        $search = $_POST["search"];
        $query = phantrangsearchloai($min, $search, $loai);
        while ($row = mysqli_fetch_array($query)) {
            $result['items'][] = $row;
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($result);
    } else if ($_POST["action"] == "phantrangloai") {
        $min = intval($_POST["sotrang"]) * 6 - 6;
        $loai = $_POST["loai"];
        $query = phantrangloai($min, $loai);
        while ($row = mysqli_fetch_array($query)) {
            $result['items'][] = $row;
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($result);
    } else if ($_POST["action"] == "phantranggia") {
         $min = intval($_POST["sotrang"]) * 6 - 6;
        $loai = $_POST['loaisp'];
        $search = $_POST['search'];
        if($search!="tensp"){
            $search = "N'%$search%'";
        }
        $giathap = $_POST['giathap'];
        $giacao = $_POST['giacao']; 
        $sql = $_POST['sql'];
        $query = phantranggia($min, $giathap, $giacao, $search, $loai, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $result['items'][] = $row;
        } 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json'); 
        echo json_encode($result);  
    }
    
    else if($_POST["action"]=="themvaogiohang"){
        if(isset($_POST["id"])){
            include("admin/config.php");
            $query=mysqli_query($connect,"SELECT * from tbl_sanpham where masp=$_POST[id]");
            if(mysqli_num_rows($query)>0){
                if(isset($_SESSION["cart_".$_POST["id"]])){
                    $soluong =$_SESSION["cart_".$_POST["id"]]+$_POST["sl"];
                    $query=mysqli_query($connect,"SELECT * from tbl_sanpham where masp=$_POST[id] and soluong>=$soluong");
                    if(mysqli_num_rows($query)>0){
                        $_SESSION["cart_".$_POST["id"]]=$soluong;
                        echo 1;
                    }else{
                        echo 2;
                    }
                }else{
                    $query=mysqli_query($connect,"SELECT * from tbl_sanpham where masp=$_POST[id] and soluong>$_POST[sl]");
                    if(mysqli_num_rows($query)>0){
                        $_SESSION["cart_".$_POST["id"]]=$_POST["sl"];
                        echo 1;
                    }else{
                        echo 2;
                    }
                }
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }
    else if($_POST["action"]=="xoa"){
        unset($_SESSION["cart_".$_POST["id"]]);
        echo 1;
    }
    else if($_POST["action"]=="giam"){
        $_SESSION["cart_".$_POST["id"]]=$_SESSION["cart_".$_POST["id"]]-1;
        echo $_SESSION["cart_".$_POST["id"]];
    }
    else if($_POST["action"]=="tang"){
        include("admin/config.php");
        $soluong=$_SESSION["cart_".$_POST["id"]]+1.0;
        $query=mysqli_query($connect,"SELECT * from tbl_sanpham where masp=$_POST[id] and soluong>=$soluong");
        if(mysqli_num_rows($query)>0){
            $_SESSION["cart_".$_POST["id"]]=$soluong;
            echo $_SESSION["cart_".$_POST["id"]];
        }
        else{
            echo $_SESSION["cart_".$_POST["id"]];
        }
        
    }
    else if($_POST["action"]=="tdsl"){
        include("admin/config.php");
        $soluong=$_POST["sl"];
        $slkho=mysqli_fetch_array(mysqli_query($connect,"SELECT soluong from tbl_sanpham where masp=$_POST[id]"));
        $query=mysqli_query($connect,"SELECT * from tbl_sanpham where masp=$_POST[id] and soluong>=$soluong");
        if(mysqli_num_rows($query)>0){
            $_SESSION["cart_".$_POST["id"]]=$soluong;
            echo $_SESSION["cart_".$_POST["id"]];
        }
        else{
            $_SESSION["cart_".$_POST["id"]]=$slkho["sl"];
            echo  $_SESSION["cart_".$_POST["id"]];
        }
    
    }else if($_POST["action"]=="thanhtoan"){
        if(isset($_SESSION["User"])){
            echo 1;
        }
        else{
            echo 0;
        }
    }else if($_POST["action"]=="dathang"){
        include("admin/config.php");
            $idkh=mysqli_fetch_array(mysqli_query($connect,"SELECT makh from tbl_khachhang where taikhoan='$_POST[user]'"));
            $date=date("d-m-Y");
            $tt=$_POST["tt"];
            $name=$_POST["name"];
            $phone=$_POST["phone"];
            $address=$_POST["address"];
            $sql="INSERT into tbl_hoadon(makh,hoten,sdt,tongtien,ngayban,diachi,trangthai) values ('$idkh[makh]','$name','$phone','$tt','$date','$address','Đã đặt')";
            $qr=mysqli_query($connect,$sql);
            $sql3="SELECT mahd from tbl_hoadon ORDER BY mahd DESC LIMIT 1";
            $qr3=mysqli_query($connect,$sql3);
            while($row3=mysqli_fetch_array($qr3)){
                $idhd=$row3["mahd"];
            }
            if($qr){
                foreach($_SESSION as $key => $value){
                    $mang=explode("_", $key);
                    if($mang[0]=="cart"){
                        $sqlgia="SELECT giaban from tbl_sanpham where masp=$mang[1]";
                        $qrgia=mysqli_query($connect,$sqlgia);
                        $sl=$_SESSION["cart_".$mang[1]];
                        while($rowgia=mysqli_fetch_array($qrgia)){
                            $gia=$rowgia["giaban"];
                        }
                        $thanhtien=$sl*$gia;
                        $sql2="INSERT into tbl_chitiethd(mahd,masp,giagoc,giaban,soluong) values($idhd,$mang[1],0,$gia,$sl) ";
                        $qr2=mysqli_query($connect,$sql2);
                        $sql1="UPDATE tbl_sanpham set soluong=soluong-$value where masp=$mang[1]";
                        $query1=mysqli_query($connect,$sql1);
                        unset($_SESSION["cart_".$mang[1]]);
                    }
                }
                echo 1;
            }
            else{
                echo 0;
            }
    }else if($_POST["action"]=="chitiethd"){
        if(isset($_SESSION["User"])){
            echo 1;
        }
        else{
            echo 0;
        }
    }else if($_POST["action"]=="register"){
        $e= new action();
        echo $e->dangky($_POST["fullname"],$_POST["diachi"],$_POST["sodt"],$_POST["email"],$_POST["pass"]);
    }
}
?>    