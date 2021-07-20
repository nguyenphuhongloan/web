<div class="right">
    <div class="right__content">
        <div class="right__title">Bảng điều khiển</div>
        <p class="right__desc">Thêm chức vụ</p>
        <div class="right__formWrapper">
            <div style="max-width: 400px;margin:0 auto;">
                <div class="right__inputWrapper">
                    <label for="title">Chức vụ</label>
                    <input type="text" placeholder="chức vụ" id="tencv">
                </div>
                <button class="btn" type="submit" onclick="themcv()">Thêm</button>
            </div>
        </div>
    </div>
</div>

<script>
    function themcv() {
        var cv = $('#tencv').val();
        $.post("modulesad/xuly.php", {
            cv: cv,
            action: "themcv"
        }, function(result) {
            if (result == 1) {
                alert("Thêm thành công");
            } else
                alert("Thêm thất bại");
        });
    }
</script>