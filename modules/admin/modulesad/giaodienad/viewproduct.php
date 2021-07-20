<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Xem sản phẩm</p>
        <div class="right__table">
            <div class="right__tableWrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Hình ảnh</th>
                            <th>Giá SP</th>
                            <th>Sửa</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("./config.php");
                        $sql = "SELECT * from tbl_sanpham";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            if ($row['trangthai'] == 1)
                                echo "<tr><td data-label='STT'>" . $row["masp"] . "</td>
                                <td data-label='Tên sản phẩm'>" . $row["tensp"] . "</td>
                                <td data-label='Số lượng'>" . $row["soluong"] . "</td>
                                <td data-label='Hình ảnh'><img src='../img/" . $row["linkhinhanh"] . "' style='width:100px'></td>
                                <td data-label='Giá SP'>" . number_format($row["giaban"]) . "₫</td>
                                <td data-label='Sửa' class='right__iconTable'><a href='indexad.php?action=suasp&id=" . $row["masp"] . "' ><img src='modulesad/img/icon-edit.svg' ></a></td>
                                <td data-label='Trạng thái'><label class='switch'><input type='checkbox' id='trangthaisp".$row['masp']."' onclick='ansp(" . $row['masp'] . ")' checked><span class='slider round'></span></label></td></tr>";
                            else echo "<tr><td data-label='STT'>" . $row["masp"] . "</td>
                                <td data-label='Tên sản phẩm'>" . $row["tensp"] . "</td>
                                <td data-label='Số lượng'>" . $row["soluong"] . "</td>
                                <td data-label='Hình ảnh'><img src='../img/" . $row["linkhinhanh"] . "' style='width:100px'></td>
                                <td data-label='Giá SP'>" . number_format($row["giaban"]) . "₫</td>
                                <td data-label='Sửa' class='right__iconTable'><a href='indexad.php?action=suasp&id=" . $row["masp"] . "' ><img src='modulesad/img/icon-edit.svg' ></a></td>
                                <td data-label='Trạng thái'><label class='switch'><input type='checkbox' id='trangthaisp" . $row['masp'] . "' onclick='ansp(" . $row['masp'] . ")'><span class='slider round'></span></label></td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    function ansp(masp) {
        var id = "trangthaisp"+masp;
        var check;
        if (document.getElementById(id).checked) {
            check = 1;
        } else check = 0;
        var action = "ansp";
        $.post("modulesad/xuly.php", {
            masp: masp,
            check: check,
            action: action
        }, function(result) {

            if (result == 0) {
                alert("Đã ẩn sản phẩm")
            } else alert("Đã bỏ ẩn sản phẩm");
        }) 
    }
</script>