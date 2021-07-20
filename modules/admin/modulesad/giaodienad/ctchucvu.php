<div class="right">
    <div class="right__content" style="text-align: center;">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Xem chức vụ</p>
        <div class="right__table">
            <div class="right__tableWrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Mã quyền</th>
                            <th>Tên Quyền</th>
                            <th>Check</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("./config.php");
                        
                        $macv = $_GET['macv'];
                        $sql = "SELECT * from tbl_quyen";
                        $sql1 = "SELECT * from tbl_quyenthuocchucvu where macv=$macv";

                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            $maquyen = $row['maquyen'];
                            echo "<tr><td data-label='Mã'>" . $row["maquyen"] . "</td>
                                        <td data-label='Quyền'>" . $row["tenquyen"] . "</td>";
                            $check = 0;
                            $query1 = $connect->query($sql1);
                            while ($row1 = $query1->fetch_array()) {

                                $maquyen1 = $row1['maquyen'];
                                if ($maquyen == $maquyen1) {
                                    echo " 
                                        <td data-label='Check'><input id='" . $row['maquyen'] . "' type='Checkbox' Checked></td>";
                                    $check = 1;
                                }
                            }
                            if ($check == 0) {
                                echo "
                                        <td data-label='Check'><input id='" . $row['maquyen'] . "' type='Checkbox' ></td>";
                            }
                        }
                        echo "
                        </tr>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn" type="submit" name="submit" style="width: 50%; margin: 0 auto;" onclick="cnchucvu(<?php echo $_GET['macv'] ?>)">Cập nhật
        </button>
    </div>
</div>
<script>
    function cnchucvu(macv) {
        xoatheomacv(macv);
        for (i = 1; i <= 7; i++) {
            if (document.getElementById(i).checked) {
                var quyen = i;
               
                $.post("modulesad/xuly.php", {
                    macv: macv,
                    quyen: quyen,
                    action: "capnhatquyen"
                }, function(result) { 
                });
            }

        }
        alert("Cập nhật thành công");
    }

    function xoatheomacv(macv) {
        $.post("modulesad/xuly.php", {
            macv: macv,
            action: "xoatheomacv"
        }, function(result) {
        })
    }
</script>