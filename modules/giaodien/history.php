<div  style="display: block;">
    <div class="grid minheight">
        <div class="xemgiohang" style="display: block;">LỊCH SỬ</div>
        <table id="bangls" border="1" style="border-collapse: collapse; width: 100%;">
            <thead>
            <tr>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                include("modules\admin\config.php");
                if(isset($_SESSION['User'])){
                $idkh=mysqli_fetch_array(mysqli_query($connect,"SELECT makh from tbl_khachhang where taikhoan='$_SESSION[User]'"));
                $sql="SELECT * from tbl_hoadon where makh=$idkh[makh]";
                $query=mysqli_query($connect,$sql);
                while($row=mysqli_fetch_array($query)){
                    echo "<tr>
                        <td>".$row['hoten']."</td>
                        <td>".$row['diachi']."</td>
                        <td>".$row['ngayban']."</td>
                        <td>".number_format($row['tongtien'])."</td>
                        <td>".$row['trangthai']."</td>
                        <td>
                            <button onclick=chitiethd(".$row['mahd'].")>Chi tiết</button>
                        </td>
                    </tr>";
                }} else
                echo "<script>alert('Xin vui lòng đăng nhập');
                            document.getElementById('mymodal').style.display='block';</script>";
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function chitiethd(id) {
        $.post("modules/ajax.php",{id:id,action:"chitiethd"},function(result){
            if(result==1){
                location.href="index.php?action=chitietdh&mahd="+id+" ";
            }
        });
    }
</script>