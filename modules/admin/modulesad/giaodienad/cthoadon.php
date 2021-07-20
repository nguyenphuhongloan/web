<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Xem đơn hàng</p>
        <div class="right__table">
            <div class="right__tableWrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("./config.php");
                        $sql = "SELECT cthd.masp,cthd.soluong,cthd.giaban,sp.tensp,sp.linkhinhanh from tbl_chitiethd cthd,tbl_sanpham sp where mahd= $_GET[id] and cthd.masp=sp.masp";
                        $query = mysqli_query($connect, $sql);
                        $dem = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $dem++;
                            $thanhtien = number_format((int)$row['giaban'] * (int)$row['soluong']);
                            echo "<tr><td>$dem</td>
                                <td>" . $row['tensp'] . "</td>
                                <td><img src='../img/" . $row['linkhinhanh'] . "' style='width:100px'></td>
                                <td>" . $row['soluong'] . "</td>
                                <td>" . number_format($row['giaban']) . "</td>
                                <td>$thanhtien</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>