<?php $quizTitle = $data['quiz-title'];
$quizDesc = $data['quiz-desc'];
$questionArray = $data['quiz-question'];
?>

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
