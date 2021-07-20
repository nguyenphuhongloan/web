<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Thêm nhân viên</p>
        <div class="right__formWrapper">
            <div style="max-width: 400px;margin:0 auto;">
                <div class="right__inputWrapper">
                    <label for="title">Tên nhân viên</label>
                    <input type="text" placeholder="Tên nhân viên" id="tennv">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Tài khoản</label>
                    <input type="text" placeholder="Tài khoản" id="taikhoan">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Mật khẩu</label>
                    <input type="password" placeholder="Mật khẩu" id="matkhau">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Số điện thoại</label>
                    <input type="text" placeholder="Số điện thoại" id="sdt">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Địa chỉ</label>
                    <input type="text" placeholder="Địa chỉ" id="dc">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Chức vụ</label>
                    <select name="" id="chucvu">
                        <?php
                        include("./config.php");
                        $sql = "SELECT * from tbl_chucvu";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            echo "<option value='" . $row["macv"] . "'>" . $row['tencv'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button class="btn" type="submit" onclick="themnv()">Thêm</button>
            </div>
        </div>
    </div>
</div>
<script>
    function themnv() {
        var tennv = xoadau($("#tennv").val());
        var taikhoan = xoadau($("#taikhoan").val());
        var pass = xoadau($("#matkhau").val());
        var sdt = xoadau($("#sdt").val());
        if(isNaN(sdt)){
            alert("Số điện thoại phải là số");
            return;
        }
        var diachi = xoadau($("#dc").val());
        var chucvu = $("#chucvu").val();
        $.post("modulesad/xuly.php", {
            tennv: tennv,
            taikhoan: taikhoan,
            chucvu: chucvu,
            pass: pass,
            sdt: sdt,
            diachi: diachi,
            action: "themnv"
        }, function(result) {
            if (result == 1)
                alert("Thêm thành công");
            else
                alert("Thêm thất bại");
        });
    }
</script>