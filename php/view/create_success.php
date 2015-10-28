<?php require_once('parseUrl.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz | Create</title>
    <!-- Google Font -->
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic,700,300italic,300,200,200italic,700italic,900,900italic&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Preset CSS -->
    <link rel="stylesheet" href="../assets/css/preset.css">
    <!-- Create CSS -->
    <link rel="stylesheet" href="../assets/css/create.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
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

<!-- jQuery -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/js/create.js"></script>
</body>
</html>
