<?php
class action
{
    function dangnhap($tk, $mk)
    {
        include("admin/config.php");
        $sql = "SELECT taikhoan from tbl_khachhang where taikhoan='$tk'";
        $query = $connect->query($sql);
        $mk = md5($mk);
        if (mysqli_num_rows($query) > 0) {
            $sql1 = "SELECT taikhoan,matkhau,trangthai from tbl_khachhang where taikhoan='$tk' and matkhau='$mk'";
            $query1 = $connect->query($sql1);
            if (mysqli_num_rows($query1) > 0) {
                while($row = $query1->fetch_array()){
                    if($row['trangthai']==1){
                        $_SESSION["User"] = $tk;
                        return 1;
                    }
                    return 3;
                }
            } else {
                return 2;
            }
        } else {
            return 0;
        }
    }
    function dangky($fullname, $diachi, $sodt, $email, $pass)
    {
        include("admin\config.php");
        $pass = md5($pass);
        $sql = "SELECT taikhoan from tbl_khachhang where taikhoan='$email'";
        $query = mysqli_query($connect, $sql);
        if (mysqli_num_rows($query) > 0) {
            return 0;
        } else if (mysqli_num_rows($query) == 0) {
            $sql1 = "INSERT into tbl_khachhang(tenkh,diachi,sdt,taikhoan,matkhau,trangthai) values ('$fullname','$diachi','$sodt','$email','$pass','1')";
            $query1 = mysqli_query($connect, $sql1);
            return 1;
        }
        return 7;
    }
    function get_SanPhams()
    {
        include("admin/config.php");
        return mysqli_query($connect, "SELECT * from tbl_sanpham where trangthai = 1");
    }
    function product1()
    {
        include("modules/admin/config.php");
        $sql = "SELECT * from tbl_sanpham";
        $query = $connect->query($sql);
        $dem = 0;
         while($row=$query->fetch_array()){
                $dem++;
                if($row['giakhuyenmai']!=0){
                echo "<div class='column_3'>
                <a href='index.php?action=detail&id=" . $row["masp"] . "' style='text-decoration:none;'>
                <div class='product-box'>
                    <div class='sale-flash'>Sale</div>
                    <div class='product-img'>
                        <img src='modules/img/" . $row["linkhinhanh"] . "'>
                    </div>
                    <div class='product-info'>
                        <p class='product-name'>" . $row["tensp"] . "</p>
                        <div class='product-price'>" . $row["giaban"] . "₫</div>
                        <div class='product-price-old'>" . $row["giakhuyenmai"] . "₫</div>
                    </div>
                </div>
                </a>
                </div>";
                }
                else
                    echo "<div class='column_3'>
                        <a href='index.php?action=detail&id=" . $row["masp"] . "' style='text-decoration:none;'>
                        <div class='product-box'>
                            <div class='sale-flash'>Sale</div>
                            <div class='product-img'>
                                <img src='modules/img/" . $row["linkhinhanh"] . "'>
                            </div>
                            <div class='product-info'>
                                <p class='product-name'>" . $row["tensp"] . "</p>
                                <div class='product-price'>" . $row["giaban"] . "₫</div>
                            </div>
                        </div>
                        </a>
                    </div>";
            if($dem==8)
                break;
        } 
    }

    function detailproduct($id)
    {
        include("modules/admin/config.php");
        $sql = "SELECT * from tbl_sanpham where masp=$id and trangthai = 1";
        $query = $connect->query($sql);
        $dem = 0;
        $dem1 = 0;
        while ($row = $query->fetch_array()) {
            if($row['giakhuyenmai']!=0){
                echo "<div class='column_4' id='detailimg'>;
                <img src='modules/img/" . $row["linkhinhanh"] . "' class='img-detail' style='display:block;'>     
            </div>
            <div class='column_5' id='detailinfor'>
                <h2 class='product-detail-title'>" . $row["tensp"] . "</h2>
                <div class='products-detail-price'>
                    <div class='product-detail-price'>" . $row["giaban"] . "₫</div>
                    <div class='product-detail-price-old'>" . $row["giakhuyenmai"] . "₫</div>
                </div>
                <ul class='product-description'>
                    <li>" . $row["mota"] . "</li>
                </ul>
                <label class='lbsl'>Số lượng: </label>
                <input type='text' class='sl' id='sl' value=1>
                <br><br>
                <button class='cart-button' onclick='themvaogiohang(" . $row['masp'] . ")'>Thêm vào giỏ hàng</button>
            </div>";
            } else echo "<div class='column_4' id='detailimg'>;
                <img src='modules/img/" . $row["linkhinhanh"] . "' class='img-detail' style='display:block;'>     
            </div>
            <div class='column_5' id='detailinfor'>
                <h2 class='product-detail-title'>" . $row["tensp"] . "</h2>
                <div class='products-detail-price'>
                    <div class='product-detail-price'>" . $row["giaban"] . "₫</div>
                   
                </div>
                <ul class='product-description'>
                    <li>" . $row["mota"] . "</li>
                </ul>
                <label class='lbsl'>Số lượng: </label>
                <input type='text' class='sl' id='sl' value=1>
                <br><br>
                <button class='cart-button' onclick='themvaogiohang(" . $row['masp'] . ")'>Thêm vào giỏ hàng</button>
            </div>";
        }
    }


    function sanpham($id)
    {
        include("modules/admin/config.php");
        $sql = "SELECT * from tbl_sanpham where masp=$id";
        $query = $connect->query($sql);
        return $query;
    }
    function checkStringInput($input){
        $charSpecial = ['\\', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '-', '*', '/', '[', ']', '{', '}', '|', '\'', '"', '<', '>', '?'];
        for($i=0; $i<count($charSpecial); $i++){
            $input = str_replace($charSpecial[$i], "", $input);
        }
        return $input;
    }
}
