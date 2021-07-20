<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Thêm thể loại</p>
        <div class="right__formWrapper">
            <div style="max-width: 400px;margin:0 auto;">
                <div class="right__inputWrapper">
                    <label for="title">Tên Thể Loại</label>
                    <input type="text" placeholder="Tên thể loại" id="tentl">
                </div>
                <button class="btn" type="submit" onclick="themtl()">Thêm</button>
            </div>
        </div>
    </div>
</div>
<script>
    function themtl() {
        var tl = xoadau($('#tentl').val());
        
        $.post("modulesad/xuly.php", {
            tl: tl,
            action: "themtl"
        }, function(result) {
            if (result == 1) {
                alert("Thêm thành công");
            } else
                alert("Thêm thất bại");
        });
    }
</script>