<?php $quizTitle = $data['quiz-title'];
$quizDesc = $data['quiz-desc'];
$questionArray = $data['quiz-question'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz | Play</title>
    <!-- Google Font -->
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic,600italic,700,300italic,300,200,200italic,700italic,900,900italic&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Preset CSS -->
    <link rel="stylesheet" href="../assets/css/preset.css">
    <!-- Play CSS -->
    <link rel="stylesheet" href="../assets/css/play.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>
<div class="container play-page">
    <div class="play-heading text-center">
        <h1><?php echo $quizTitle ?></h1>
        <b><i class="fa fa-rocket"></i></b>
        <span><?php echo $quizDesc ?></span>
    </div>
    <div class="play-quiz">
        <?php
        $stt = 1;
        foreach ($questionArray as $question) {
        ?>

            <div class="play-quiz-box">
                <div class="play-question">
                    <span><?php echo $stt ?>.</span>
                    <h2><?php echo $question['title'] ?></h2>
                </div>
                <ul class="play-answer">
                <?php
                foreach ($question['answer-list'] as $answer) {
                ?>
                    <li class="play-answer-item">
                        <button class="btn btn-custom">
                            <?php echo $answer ?>
                        </button>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
        <?php
            $stt++;
        }
        ?>
        <!-- Divider -->
        <div class="play-divider text-center">
            <i class="fa fa-hourglass-end"></i>
        </div>
        <!-- Result -->
        <div class="play-result text-center">
            <h3>
                Bạn đã làm đúng được
                <b>1/3</b>
            </h3>
            <a href="create.php" class="btn btn-custom" type="submit">Tạo Quiz Khác</a>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/play.js"></script>
</body>
</html>