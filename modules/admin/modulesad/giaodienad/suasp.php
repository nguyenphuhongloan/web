<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Sửa sản phẩm</p>
        <div class="right__formWrapper">
            <form action="modulesad/actionsuasp.php" method="post" onsubmit="return(validate())" enctype="multipart/form-data">
                <input type="text" name="idsp" value="<?php echo $_GET['id'] ?>" style="display: none;">
                <div class="right__inputWrapper">
                    <label for="title">Tên sản phẩm</label>
                    <?php
                    include("./config.php");
                    $id = $_GET['id'];
                    $sql = "SELECT * from tbl_sanpham WHERE masp=$id";
                    $query = $connect->query($sql);
                    while ($row = $query->fetch_array()) {
                        echo "<input type='text' placeholder='tên sản phẩm' value='" . $row["tensp"] . "' name='tensp' id='tensp'>";
                    }
                    ?>
                </div>
                <div class="right__inputWrapper">
                    <label for="category">Thể loại</label>
                    <select name="loaisp">
                        <option disabled selected>Chọn thể loại</option>
                        <?php
                        include("./config.php");
                        $sql1 = "SELECT matheloai from tbl_sanpham WHERE masp=$id";
                        $query1 = $connect->query($sql1);
                        while ($row = $query1->fetch_array()) {
                            $idloaisp = $row['matheloai'];
                            echo $idloaisp;
                        }
                        $sql = "SELECT * from tbl_theloai";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            if ($row['matheloai'] != $idloaisp)
                                echo "<option value = " . $row['matheloai'] . ">" . $row['tentheloai'] . "</option>";
                            else
                                echo "<option value = " . $row['matheloai'] . " selected>" . $row['tentheloai'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <?php
                include("./config.php");
                $id = $_GET['id'];
                $sql = "SELECT * from tbl_sanpham WHERE masp=$id";
                $query = $connect->query($sql);
                while ($row = $query->fetch_array()) {
                    echo "<div class='right__inputWrapper'>
                            <label for='image'>Hình ảnh 1</label>
                            <input type='file' name='img1' id='img1' onchange='doisp()' >
                            <img id='img' src='../img/" . $row["linkhinhanh"] . "' >
                        </div>
                        <div class='right__inputWrapper'>
                            <label for='title'>Số lượng</label>
                            <input type='text' value='" . $row["soluong"] . "' id='soluong' placeholder='SỐ lượng sản phẩm' name='soluong'>
                        </div>
                        <div class='right__inputWrapper'>
                            <label for='title'>Giá sản phẩm</label>
                            <input type='text' value='" . $row["giaban"] . "' id='gia' placeholder='Giá sản phẩm' name='gia'>
                        </div>
                        <div class='right__inputWrapper'>
                        <label for='title'>Giá gốc sản phẩm</label>
                            <input type='text' placeholder='Giá gốc sản phẩm' name='giagoc' id='giagoc' value='" . $row["giakhuyenmai"] . "'>
                        </div>
                        <div class='right__inputWrapper'>
                            <label for='desc'>Mô tả</label>
                            <textarea name='mota'  cols='30' rows='10' placeholder='Mô tả'>" . $row['mota'] . "</textarea>
                        </div>";
                }
                ?>
                <button class="btn" type="submit" name="submit">Sửa</button>
            </form>
        </div>
    </div>
</div>
<script>
    function doisp() {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#img").fadeIn("fast").attr('src', tmppath);

    }
</script>
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

        var tenfile = $('#img1').val();
        var duoifile = tenfile.slice(tenfile.lastIndexOf(".") + 1);
        if (duoifile != "png" && duoifile != "jpg" && duoifile != "jpeg" && duoifile != "") {
            alert("Chọn ảnh có đuôi file là png, jpg hoặc jpeg");
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
            alert("Nhập giá gốc sản phẩm là số");
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