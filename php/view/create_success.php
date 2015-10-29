<?php require_once('parseUrl.php') ?>
<div class="container create-page">
    <div class="create-heading text-center">
        <h1>Oop!!!</h1>
        <b><i class="fa  fa-exclamation-triangle"></i></b>
        <span>Xin chúc mừng Quiz của bạn đã được tạo thành công!</span><br>

        <span>Đây là link của bạn:</span><br>
        <input class="form-control" type="text" readonly value="<?php echo parseUrl("/play.php?link=".$data['PLAY-LINK']); ?>"><br>
        <a href="<?php echo parseUrl("/play.php?link=".$data['PLAY-LINK']); ?>"> <span class="fa fa-link"></span> Play quiz</a><br>

    </div>
</div>
