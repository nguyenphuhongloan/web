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
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Địa chỉ</th>
                            <th>Sửa</th>
                            <th>Khóa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("./config.php");
                        $sql = "SELECT * from tbl_khachhang";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            if ($row['trangthai'] == 1)
                                echo "<tr>
                                <td data-label='STT'>" . $row["makh"] . "</td>
                                <td data-label='Tên'>" . $row["tenkh"] . "</td>
                                <td data-label='Email'>" . $row["taikhoan"] . "</td>
                                <td data-label='Phone'>" . $row["sdt"] . "</td>
                                <td data-label='Địa chỉ'>" . $row["diachi"] . "</td>
                                <td data-label='Sửa' class='right__iconTable'><a href='indexad.php?action=editkh&makh=" . $row["makh"] . "'><img src='modulesad/img/icon-edit.svg'> </></td>
                                <td data-label='Khóa'><label class='switch'><input type='checkbox' id='trangthai" . $row['makh'] . "' checked onclick='blockkh(" . $row['makh'] . ")'><span class='slider round'></span></label></td>
                            </tr>";
                            else
                                echo "<tr>
                                <td data-label='STT'>" . $row["makh"] . "</td>
                                <td data-label='Tên'>" . $row["tenkh"] . "</td>
                                <td data-label='Email'>" . $row["taikhoan"] . "</td>
                                <td data-label='Phone'>" . $row["sdt"] . "</td>
                                <td data-label='Địa chỉ'>" . $row["diachi"] . "</td>
                                <td data-label='Sửa' class='right__iconTable'><a href='indexad.php?action=editkh&makh=" . $row["makh"] . "'><img src='modulesad/img/icon-edit.svg'> </></td>
                                <td data-label='Khóa'><label class='switch'><input type='checkbox' id='trangthai" . $row['makh'] . "' onclick='blockkh(" . $row['makh'] . ")'><span class='slider round'></span></label></td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function blockkh(makh) {
        var id = "trangthai" + makh;
        var check;
        if (document.getElementById(id).checked) {
            check = 1;
        } else check = 0;
        var action = "blockkh";
        $.post("modulesad/xuly.php", {
            check: check,
            makh: makh,
            action: action
        }, function(result) {
            if (result == 0)
                alert("Đã khóa khách hàng");
            else alert("Đã mở khóa khách hàng");
        })

    }
</script>