<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Thêm sản phẩm</p>
        <div class="right__formWrapper">
            <form action="modulesad/newuploadfile.php" method="post" enctype="multipart/form-data" onsubmit="return(validate())">
                <div class="right__inputWrapper">
                    <label for="title">Tên sản phẩm</label>
                    <input type="text" placeholder="tên sản phẩm" name="tensp" id="tensp">
                </div>
                <div class="right__inputWrapper">
                    <label for="category">Thể loại</label>
                    <select name="loaisp" id="loaisp">
                        <option disabled selected value="0">Chọn thể loại</option>
                        <?php
                        include("./config.php");
                        $sql = "SELECT * from tbl_theloai";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            echo "<option value = " . $row['matheloai'] . ">" . $row['tentheloai'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="right__inputWrapper">
                    <label for="image">Hình ảnh</label>
                    <input type="file" name="img1" id="img1">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Số lượng sản phẩm</label>
                    <input type="text" placeholder="Số lượng sản phẩm" name="soluong" id="soluong">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Giá sản phẩm</label>
                    <input type="text" placeholder="Giá sản phẩm" name="gia" id="gia">
                </div>
                <div class="right__inputWrapper">
                    <label for="title">Giá gốc sản phẩm</label>
                    <input type="text" placeholder="Giá gốc sản phẩm" name="giagoc" id="giagoc">
                </div>
                <div class="right__inputWrapper">
                    <label for="desc">Mô tả</label>
                    <textarea name="mota" id="" cols="30" rows="10" placeholder="Mô tả"></textarea>
                </div>
                <button class="btn" type="submit" name="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>
<script>
    function validate() {
        if ($("#tensp").val() == "") {
            alert("Nhập tên sản phẩm");
            return false;
        }
        var str = xoadau($("#tensp").val());
        if (str != $('#tensp').val()) {
            alert("Tên sản phẩm không được chứa ký tự đặc biệt");
            return false;
        }
        if ($("#img1").val() == "") {
            alert("Vui lòng chọn hình ảnh sản phẩm");
            return false;
        }
        var tenfile = $('#img1').val();
        var duoifile = tenfile.slice(tenfile.lastIndexOf(".") + 1);
        if (duoifile != "png" && duoifile != "jpg" && duoifile != "jpeg") {
            alert("Chọn ảnh có đuôi file là png, jpg hoặc jpeg");
            return false;
        }
        if ($("#loaisp").val() == null) {
            alert("Vui lòng chọn thể loại");
            return false;
        }
        if ($("#soluong").val() == "") {
            alert("Nhập số lượng sản phẩm");
            return false;
        }
        if ($("#gia").val() == "") {
            alert("Nhập giá sản phẩm");
            return false;
        }
        if ($("#giagoc").val() == "") {
            alert("Nhập giá gốc sản phẩm");
            return false;
        }
        if (isNaN($("#soluong").val())) {
            alert("Nhập số lượng sản phẩm là số");
            return false;
        }
        if (isNaN($("#gia").val())) {
            alert("Nhập giá sản phẩm là số");
            return false;
        }
        if (isNaN($("#giagoc").val())) {
            alert("Nhập giá sản phẩm là số");
            return false;
        }
        return true;
    }
</script>

<?php
if (isset($_SESSION["thongbao"])) {
    $result = $_SESSION["thongbao"];
    $msg;
    if ($result == 0) {
        $msg = "Vui lòng chọn file ảnh định dạng jpg, png hoặc jpeg";
        echo "<script>alert('" . $msg . "')</script>";
    } else if ($result != 1) {
        $msg = "Thêm hình ảnh sản phẩm thất bại";
        echo "<script>alert('" . $msg . "')</script>";
    }
    unset($_SESSION['thongbao']);
}
?>