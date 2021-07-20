<div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Cập nhật khách hàng</p>
                        <div class="right__formWrapper">
                            <div style="max-width: 400px;margin:0 auto;">
                            <?php
                                include("./config.php");
                                $makh=$_GET['makh'];
                                $sql = "SELECT * from tbl_khachhang WHERE makh=$makh";
                                $query = $connect->query($sql);
                                while($row=$query->fetch_array()){
                                    echo"<div class='right__inputWrapper'>
                                        <label for='title'>Tên khách hàng</label>
                                        <input type='text' placeholder='Tên khách hàng' id='tenkh' value='".$row["tenkh"]."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Email</label>
                                        <input type='text' placeholder='Email' id='edemail' value='".$row["taikhoan"]."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Số điện thoại</label>
                                        <input type='text' placeholder='Số điện thoại' id='edsdt' value='".$row["sdt"]."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Địa chỉ</label>
                                        <input type='text' placeholder='Địa chỉ' id='eddc' value='".$row["diachi"]."'>
                                    </div>
                                    <div class='right__inputWrapper'>
                                        <label for='title'>Mật khẩu</label>
                                        <input type='password' placeholder='Địa chỉ' id='edpass' value='".$row["matkhau"]."'>
                                    </div>
                                    <button class='btn' type='submit' onclick='edkh($makh)'>Cập nhật</button>";
                                }

                            ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
<script>
    function edkh(id){
        var tenkh=$("#tenkh").val();
        var edemail=$("#edemail").val();
        var edsdt=$("#edsdt").val();
        var eddc=$("#eddc").val();
        var edpass=$("#edpass").val();
        $.post("modulesad/xuly.php",{tenkh:tenkh,edemail:edemail,eddc:eddc,edsdt:edsdt,edpass:edpass,id:id,action:"edkh"},function(result){
            if(result==1)
                alert("Cập nhật thành công");
            else
                alert("Cập nhật thất bại");
        });
    }
</script>