<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Xem đơn hàng</p>
        <div class="right__table">
            <div class="right__tableWrapper">
                <div class="locdonhang">
                    <input type="date" name="" id="ngaydau">
                    <input type="date" name="" id="ngaycuoi">
                    <button onclick="searchtime()" class="btn" style="width: 55px;height: 25px;">Tìm</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Tổng tiền</th>
                            <th>Địa chỉ</th>
                            <th>Ngày bán</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>

                    <tbody id="searchhd">
                        <?php
                        include("./config.php");
                        $sql = "SELECT * from tbl_hoadon";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            echo "<tr>
                                            <td data-label='Mã'>" . $row["mahd"] . "</td>
                                            <td data-label='Tên'>" . $row["hoten"] . "</td>
                                            <td data-label='Tổng tiền'>" . $row["tongtien"] . " đ</td>
                                            <td data-label='Địa chỉ'>" . $row["diachi"] . "</td>
                                            <td data-label='Ngày bán'>" . $row["ngayban"] . "</td>
                                            <td data-label='Trạng thái'>
                                                ";
                            $tt = $row["trangthai"];
                            if ($tt == "Đã đặt") {
                                echo "<select class='trangthai' id='ttdh' onchange='trangthaihd(" . $row["mahd"] . ")'>
                                                            <option Selected>Đã đặt</option>
                                                            <option >Đang xử lý</option>
                                                            <option >Hoàn thành</option>
                                                            <option >Hủy đơn</option>
                                                            </select>";
                            } else if ($tt == "Đang xử lý") {
                                echo "<select class='trangthai' id='ttdh' onchange='trangthaihd(" . $row["mahd"] . ")'>
                                                            <option Selected>Đang xử lý</option>
                                                            <option >Đã đặt</option>
                                                            <option >Hoàn thành</option>
                                                            <option >Hủy đơn</option>
                                                            </select>";
                            } else if ($tt == "Hoàn thành") {
                                echo "<select class='trangthai' id='ttdh' onchange='trangthaihd(" . $row["mahd"] . ")'>
                                                            <option Selected>Hoàn thành</option>
                                                            <option >Đã đặt</option>
                                                            <option >Đang xử lý</option>
                                                            <option >Hủy đơn</option>
                                                            </select>";
                            } else if ($tt == "Hủy đơn") {
                                echo "<select class='trangthai' id='ttdh' onchange='trangthaihd(" . $row["mahd"] . ")'>
                                                            <option Selected>Hủy đơn</option>
                                                            <option >Đã đặt</option>
                                                            <option >Đang xử lý</option>
                                                            <option >Hoàn thành</option>
                                                            </select>";
                            }
                            echo "
                                            </td>
                                            <td data-label='Chi tiết'><button onclick=cthoadon(" . $row['mahd'] . ")>Chi tiết</button></td>
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
    function cthoadon(id) {
        $.post("modulesad/xuly.php", {
            id: id,
            action: "cthoadon"
        }, function(result) {

            if (result == 1) {
                location.href = "indexad.php?action=cthoadon&id=" + id + " ";
            }
        });
    }

    function searchtime() {
        var ngaydau = $("#ngaydau").val();
        var ngaycuoi = $("#ngaycuoi").val();
        $("#searchhd").html("");
        $.post("modulesad/xuly.php", {
            ngaydau: ngaydau,
            ngaycuoi: ngaycuoi,
            action: "time"
        }, function(result) {
            result.items.forEach(item => {
                if (item.trangthai == "Đã đặt")
                    $("#searchhd").append("<tr><td data-label='Mã'>" + item.mahd + "</td><td data-label='Tên'>" + item.hoten + "</td><td data-label='Tổng tiền'>" + item.tongtien + " đ</td><td data-label='Địa chỉ'>" + item.diachi + "</td><td data-label='Ngày bán'>" + item.ngayban + "</td><td data-label='Trạng thái'><select class='trangthai' id='ttdh' onchange='trangthaihd(" + item.mahd + ")'><option Selected>Đã đặt</option><option >Đang xử lý</option><option >Hoàn thành</option><option >Hủy đơn</option></select><td data-label='Chi tiết'><button onclick=cthoadon(" + item.mahd + ")>Chi tiết</button></td></tr>");
                else if (item.trangthai == "Đang xử lý")
                    $("#searchhd").append("<tr><td data-label='Mã'>" + item.mahd + "</td><td data-label='Tên'>" + item.hoten + "</td><td data-label='Tổng tiền'>" + item.tongtien + " đ</td><td data-label='Địa chỉ'>" + item.diachi + "</td><td data-label='Ngày bán'>" + item.ngayban + "</td><td data-label='Trạng thái'><select class='trangthai' id='ttdh' onchange='trangthaihd(" + item.mahd + ")'><option >Đã đặt</option><option Selected>Đang xử lý</option><option >Hoàn thành</option><option >Hủy đơn</option></select><td data-label='Chi tiết'><button onclick=cthoadon(" + item.mahd + ")>Chi tiết</button></td></tr>");
                else if (item.trangthai == "Hoàn thành")
                    $("#searchhd").append("<tr><td data-label='Mã'>" + item.mahd + "</td><td data-label='Tên'>" + item.hoten + "</td><td data-label='Tổng tiền'>" + item.tongtien + " đ</td><td data-label='Địa chỉ'>" + item.diachi + "</td><td data-label='Ngày bán'>" + item.ngayban + "</td><td data-label='Trạng thái'><select class='trangthai' id='ttdh' onchange='trangthaihd(" + item.mahd + ")'><option >Đã đặt</option><option >Đang xử lý</option><option Selected>Hoàn thành</option><option >Hủy đơn</option></select><td data-label='Chi tiết'><button onclick=cthoadon(" + item.mahd + ")>Chi tiết</button></td></tr>");
                else if (item.trangthai == "Hủy đơn")
                    $("#searchhd").append("<tr><td data-label='Mã'>" + item.mahd + "</td><td data-label='Tên'>" + item.hoten + "</td><td data-label='Tổng tiền'>" + item.tongtien + " đ</td><td data-label='Địa chỉ'>" + item.diachi + "</td><td data-label='Ngày bán'>" + item.ngayban + "</td><td data-label='Trạng thái'><select class='trangthai' id='ttdh' onchange='trangthaihd(" + item.mahd + ")'><option >Đã đặt</option><option >Đang xử lý</option><option >Hoàn thành</option><option Selected>Hủy đơn</option></select><td data-label='Chi tiết'><button onclick=cthoadon(" + item.mahd + ")>Chi tiết</button></td></tr>");
            });
        });
    }

    function trangthaihd(idhd) {
        var ma = $("#ttdh").val();
        $.post("modulesad/xuly.php", {
            ma: ma,
            idhd: idhd,
            action: "ttdh"
        }, function(result) {
            if (result == 1)
                alert("Chuyển trạng thái thành công");
            else
                alert("Chuyển trạng thái thất bại");
        })
    }
</script>