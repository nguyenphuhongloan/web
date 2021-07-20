<div class="grid minheight">
    <div class="xemgiohang">XEM GIỎ HÀNG</div>
    <table id="giohang" border="1" style="border-collapse: collapse; width: 100%;">
        <tbody>
            <tr class="title-gio2">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
            <?php
                $dem=0;
                foreach($_SESSION as $key => $value){
                    $mang=explode("_", $key);
                    if($mang[0]=="cart"){
                        $a=new action;
                        $b=$a->sanpham($mang[1]);
                        while($row=mysqli_fetch_array($b)){
                            $dem++;
                            echo  "<tr class='row-gio'>
                            <td>$dem</td>
                            <td>".$row['tensp']."</td>
                            <td><img src='modules/img/".$row["linkhinhanh"]."' style='width:100px;'></td>
                            <td><p id='gb_".$row['masp']."'>".$row['giaban']."</p>VNĐ</td>
                            <td><button onclick='giam(".$row['masp'].")'>-</button>
                            <input type='text' value='".$value."' id='sl_".$row['masp']."' class='soluong' onblur='tdsl(".$row['masp'].")'>
                            <button onclick='tang(".$row['masp'].")'>+</button></td>
                            <td><p id='tt_".$row["masp"]."' class='tt'>".$row['giaban']*$value."</p>VND</td>
                            <td><i class='far fa-trash-alt' onclick='xoa(".$row['masp'].")'></i></td>
                            </tr>";
                    
                        }
                    }
                }
            ?>
           
            <tr class="row-gio-tong">
                <th colspan="4">Tổng tiền: </th><th colspan="3" id='ttt'></th>
            </tr>
        </tbody>
    </table>
    <div id="nutthanhtoan" class="thanhtoan" onclick="thanhtoan()">Thanh toán</div>
</div>

<script>
    tongtien();
function xoa(id){
  $.post("modules/ajax.php",{id:id,action:"xoa"},function(result){
      if(result==1){
          alert("xoa thanh cong");
          location.reload();
      }
      else{
          alert("xoa that bai");
      }
  });
}
function giam(id){
  if( $('#sl_'+id).val()>1){
      $.post("modules/ajax.php",{id:id,action:"giam"},function(result){
          $('#sl_'+id).val(result);
          var gb=$('#gb_'+id).html();
          $('#tt_'+id).html(result*gb);
          tongtien();
      });
  }

}
function tang(id){
  $.post("modules/ajax.php",{id:id,action:"tang"},function(result){
      $('#sl_'+id).val(result);
      
      var gb=$('#gb_'+id).html();
      $('#tt_'+id).html(result*gb);
      tongtien();
  });
}
    function tongtien(){
        var tp=0;
            $(".tt").each(function(){
                tp += parseInt($(this).html());
            });
            $("#ttt").html(tp);
    }
    function tdsl(id){
        if(parseInt($('#sl_'+id).val())!=NaN && $('#sl_'+id).val()>0){
            var sl=$('#sl_'+id).val();
            $.post("modules/ajax.php",{id:id,sl:sl,action:"tdsl"},function(result){
                $('#sl_'+id).val(result);
                var gb=$('#gb_'+id).html();
                $('#tt_'+id).html(result*gb);
                tongtien();
            });
        }
        else{
            alert("gia tri khong hop le");
            $.post("modules/ajax.php",{id:id,sl:'1',action:"tdsl"},function(result){
                $('#sl_'+id).val(result);
                var gb=$('#gb_'+id).html();
                $('#tt_'+id).html(result*gb);
                tongtien();
            });
        }
    }
    function thanhtoan(){
        $.post("modules/ajax.php",{action:"thanhtoan"},function(result){
            if(result==1){
                location.href="index.php?action=thanhtoan";
            }
            else{
                alert("Xin mời quý khách hãy đăng nhập trước khi thanh toán");
                document.getElementById("mymodal").style.display="block";
            }
        });
    }
</script>