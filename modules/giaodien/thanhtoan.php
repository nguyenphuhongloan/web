<div style="display: block;">
<div style="display: block" class="minheight">
<div id="info">
    <div><br>Họ tên người nhận<br><input type="text" id="finame" placeholder="Họ tên"><br>Địa chỉ<br><input type="text" id="diachi" placeholder="Địa chỉ"><br>Số điện thoại<br><input type="text" id="sdt" placeholder="Số điện thoại"><br>Ghi chú<br><textarea id="note" col="10" row="10" placeholder="Ghi chú"></textarea><br></div></div><table id="giohang2" border="1" style="border-collapse: collapse">
    <tbody>
    <tr>
        <th colspan="3">Giỏ hàng</th>
    </tr>
    <tr>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    <?php
        $tong=0;
        foreach($_SESSION as $key => $value){
            $mang=explode("_", $key);
            if($mang[0]=="cart"){
                $a=new action;
                $b=$a->sanpham($mang[1]);
                while($row=mysqli_fetch_array($b)){
                    $tong+=$row['giaban']*$value;
                    echo  "<tr>
                    <td>".$row['tensp']."</td>
                    <td>$value</td>
                    <td>".$row['giaban']*$value."</td>
                </tr>";    
                }
            }
        }
        echo "<tr>
            <th colspan='1'>Tổng tiền:</th>
            <th colspan='2' id='ttien'>$tong</th>
        </tr>";
    ?>
    
    
    </tbody></table><button id="dat" onclick="dathang()">Đặt hàng</button><br>
<script>
    function dathang(){
        var user="<?=$_SESSION["User"]?>";
        var name=$("#finame").val();
        var phone=$("#sdt").val();
        var address=$("#diachi").val();
        var tt=$("#ttien").html();
        if(name!="" && phone!="" && address!=""){
            $.post("modules/ajax.php",{user:user,name:name,phone:phone,address:address,tt:tt,action:"dathang"},function(result){
                if(result==1){
                    alert("đặt hàng thành công");
                    header("Location: index.php");
                }
                else{
                    alert("đặt hàng thất bại");
                }
                
            });
        }
        else{
            alert("hãy điền đầy đủ");
        }
    }
</script>