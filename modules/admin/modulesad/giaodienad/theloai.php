<div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Xem thể loại</p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Mã thể loại</th>
                                            <th>Thể loại</th>
                                            <th>Sửa</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                       <?php
                                            include("./config.php");
                                            $sql = "SELECT * from tbl_theloai";
                                            $query = $connect->query($sql);
                                            while($row=$query->fetch_array()){
                                                echo "<tr>
                                                <td data-label='Mã'>".$row["matheloai"]."</td>
                                                <td data-label='Thể loại'>".$row["tentheloai"]."</td>
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