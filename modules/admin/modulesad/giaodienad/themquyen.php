<div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Thêm quyền</p>
                        <div class="right__formWrapper">
                            <div style="max-width: 400px;margin:0 auto;">
                                <div class="right__inputWrapper">
                                    <label for="title">Quyền</label>
                                    <input type="text" placeholder="Quyền" id="tenquyen">
                                </div>
                                <button class="btn" type="submit" onclick="themquyen()">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
<script>
    function themquyen(){
        var quyen=$('#tenquyen').val();
        $.post("modulesad/xuly.php",{quyen:quyen,action:"quyen"},function(result){
            if(result==1){
                alert("Thêm thành công");
            }
            else
                alert("Thêm thất bại");
        });
    }
</script>