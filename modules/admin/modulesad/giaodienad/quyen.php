<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Xem Quyền</p>
        <div class="right__table">
            <div class="right__tableWrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Mã Quyền</th>
                            <th>Quyền</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include("./config.php");
                        $sql = "SELECT * from tbl_quyen";
                        $query = $connect->query($sql);
                        while ($row = $query->fetch_array()) {
                            echo "<tr>
                                                <td data-label='Mã'>" . $row["maquyen"] . "</td>
                                                <td data-label='Quyền'>" . $row["tenquyen"] . "</td>
                                                <td data-label='Sửa' class='right__iconTable'><div><img src='modulesad/img/icon-edit.svg'> </div></td>
                                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>