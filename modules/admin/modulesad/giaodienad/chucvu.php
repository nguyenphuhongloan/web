<div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Xem chức vụ</p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Mã chức vụ</th>
                                            <th>Chức vụ</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                       <?php
                                            include("./config.php");
                                            $sql = "SELECT * from tbl_chucvu";
                                            $query = $connect->query($sql);
                                            while($row=$query->fetch_array()){
                                                echo "<tr>
                                                <td data-label='Mã'>".$row["macv"]."</td>
                                                <td data-label='Chức vụ'>".$row["tencv"]."</td>
                                                <td data-label='Chi tiết' class='right__iconTable'><a href='indexad.php?action=ctchucvu&macv=".$row["macv"]."'>Chi tiết</a></td>
                                            </tr>";
                                            }
                                       ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
