<div class="grid minheight">
    <div class="xemgiohang">CHI TIẾT</div>
    <table id="bangls" border="1" style="border-collapse: collapse; width: 100%;">
        <tbody>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số luợng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            <tr>
            <?php
                include("modules\admin\config.php");
                $idkh=mysqli_query($connect,"SELECT * from tbl_hoadon hd,tbl_khachhang kh where mahd=$_GET[mahd] and hd.makh=kh.makh and kh.taikhoan='$_SESSION[User]'");
                if(mysqli_num_rows($idkh)>0){
                    $sql="SELECT cthd.soluong,cthd.giaban,sp.tensp,sp.linkhinhanh from tbl_chitiethd cthd,tbl_sanpham sp where mahd= $_GET[mahd] and cthd.masp=sp.masp";
                    $query=mysqli_query($connect,$sql);
                    $dem=0;
                    while($row=mysqli_fetch_array($query)){
                        $dem++;
                        $thanhtien=number_format((int)$row['giaban']*(int)$row['soluong']);
                        echo"<tr><td>$dem</td>
                        <td>".$row['tensp']. "</td>
                        <td><img src='modules/img/".$row['linkhinhanh']."' style='width:100px'></td>
                        <td>".$row['soluong']."</td>
                        <td>".number_format($row['giaban'])."</td>
                        <td>$thanhtien</td></tr>";
                    }
                }
            ?>
            </tr>
        </tbody>
    </table>
</div>