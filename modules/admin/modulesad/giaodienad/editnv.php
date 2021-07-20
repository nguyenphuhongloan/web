<div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Thêm nhân viên</p>
                        <div class="right__formWrapper">
                            <div style="max-width: 400px;margin:0 auto;">
                            <?php
                                include("./config.php");
                                $manv=$_GET['manv'];
                                $sql = "SELECT * from tbl_nhanvien where manv=$manv";
                                $query = $connect->query($sql);    
                                while($row=$query->fetch_array()){
                                    echo"<div class='right__inputWrapper'>
                                        <label for='title'>Tên nhân viên</label>
                                        <input value='".$row["tennv"]."' type='text' placeholder='Tên nhân viên' id='edtennv'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Tài khoản</label>
                                        <input type='text' placeholder='Tài khoản' id='edtaikhoan' value='".$row['tknv']."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Mật khẩu</label>
                                        <input type='password' placeholder='Mật khẩu' id='edmatkhau' value='".$row['mknv']."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Số điện thoại</label>
                                        <input type='text' placeholder='Số điện thoại' id='edsdt' value='".$row['sdt']."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Địa chỉ</label>
                                        <input type='text' placeholder='Địa chỉ' id='eddiachi' value='".$row['diachi']."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Chức vụ</label>
                                        <select  id='edchucvu'>";
                                        $ma=$row['macv'];
                                        $sql1 = "SELECT * from tbl_chucvu ";
                                        $query1 = $connect->query($sql1);    
                                        while($row1=$query1->fetch_array()){
                                            $mac=$row1['macv'];
                                            if($ma==$mac)
                                                echo"<option value='".$row1["macv"]."' Selected>".$row1['tencv']."</option>";
                                            else
                                                echo"<option value='".$row1["macv"]."'>".$row1['tencv']."</option>";
                                        }
                                    echo"    </select>
                                    </div>
                                    <button class='btn' type='submit' onclick='ednv(".$row["manv"].")'>Cập nhật</button>";
                                }
                            ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
<script>
    function ednv(id){
        var edtennv=$("#edtennv").val();
        var edtaikhoan=$("#edtaikhoan").val();
        var edmatkhau=$("#edmatkhau").val();
        var edsdt=$("#edsdt").val();
        var eddiachi=$("#eddiachi").val();
        var edchucvu=$("#edchucvu").val();
        $.post("modulesad/xuly.php",{edtennv:edtennv,edtaikhoan:edtaikhoan,edmatkhau:edmatkhau,edsdt:edsdt,eddiachi:eddiachi,id:id,edchucvu:edchucvu,action:"ednv"},function(result){
            if(result==1)
                alert("Cập nhật thành công");
            else
                alert("Cập nhật thất bại");
        })
    }
</script>