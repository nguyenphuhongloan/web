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
                            <th>Tài khoản</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Chức vụ</th>
                            <th>Sửa</th>
                            <th>Khóa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("./config.php");
                        $sql = "SELECT * from tbl_nhanvien";
                        $query = $connect->query($sql);
                        $sql1 = "SELECT * FROM tbl_chucvu";
                        while ($row = $query->fetch_array()) {
                            echo "<tr>
                                            <td data-label='STT'>" . $row["manv"] . "</td>
                                            <td data-label='Tên'>" . $row["tennv"] . "</td>
                                            <td data-label='Tài khoản'>" . $row["tknv"] . "</td>
                                            <td data-label='Phone'>" . $row["sdt"] . "</td>
                                            <td data-label='Địa chỉ'>" . $row["diachi"] . "</td>";
                            $query1 = $connect->query($sql1);
                            while ($row1 = $query1->fetch_array()) {
                                $cv = $row['macv'];
                                $cv1 = $row1['macv'];
                                if ($cv == $cv1)
                                    echo "<td data-label='Chức vụ'>" . $row1['tencv'] . "</td>";
                            }
                            if($row['trangthai']==1)
                            echo "<td data-label='Sửa' class='right__iconTable'><a href='indexad.php?action=editnv&manv=" . $row["manv"] . "'><img src='modulesad/img/icon-edit.svg'> </a></td>
                                            <td data-label='Khóa'><label class='switch'><input type='checkbox' checked id='trangthainv" . $row['manv'] . "' onclick='blocknv(" . $row['manv'] . ")'><span class='slider round'></span></label></td>
                                        </tr>";
                            else echo "<td data-label='Sửa' class='right__iconTable'><a href='indexad.php?action=editnv&manv=" . $row["manv"] . "'><img src='modulesad/img/icon-edit.svg'> </a></td>
                                            <td data-label='Khóa'><label class='switch'><input type='checkbox' id='trangthainv" . $row['manv'] . "' onclick='blocknv(" . $row['manv'] . ")'><span class='slider round'></span></label></td>
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
    function blocknv(manv) {
        var id = "trangthainv" + manv;
        var check;
        if (document.getElementById(id).checked) {
            check = 1;
        } else check = 0;
        var action = "blocknv";
        $.post("modulesad/xuly.php", {
            check: check,
            manv: manv,
            action: action
        }, function(result) {
            if (result == 0)
                alert("Đã khóa nhân viên");
            else alert("Đã mở khóa nhân viên");
        })

    }
</script>