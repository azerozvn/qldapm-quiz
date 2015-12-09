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
                        <button class="btn btn-custom " data-index="<?php echo $answer['id'] ?>">
                            <?php echo $answer['title'] ?>
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
        <div class="play-result text-center" id="result">
            <h3>
                Bạn đã làm đúng được
                <b><span id="right">0</span>/<span id="total">0</span></b>
            </h3>
            <a href="create.php" class="btn btn-custom" type="submit">Tạo Quiz Khác</a>
        </div>
    </div>
</div>
<div class="modal fade" id="result-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Kết quả</h4>
      </div>
      <div class="modal-body">
        <span>Bạn đã trả lời đúng: </span><h3 id="result-total" style="display:inline-block; color: #f44336;"></h3><span> câu hỏi.</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <!-- <a onclick="location.reload();" class="btn btn-warning">Chơi lại</a> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
  var answers = [ <?php foreach ($questionArray as $question) { echo $question['right-answer-id'] . ","; } ?> ];
</script>
<script src="../assets/js/play.js"></script>
