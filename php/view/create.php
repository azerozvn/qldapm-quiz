<div class="container create-page">
    <div class="create-heading text-center">
        <h1>Tạo Quiz</h1>
        <b><i class="fa fa-heart-o"></i></b>
        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque cumque iste natus. Quibusdam tempora rem accusamus obcaecati doloribus, voluptas iste deserunt cum aperiam, beatae, neque assumenda consequatur ducimus earum non.</span>
    </div>
    <div class="create-quiz-box">
        <form action="create.php" method="POST">
            <!-- General -->
            <div class="quiz-general">
                <div class="quiz-title">
                    <h3>Tiêu đề Quiz</h3>
                    <input data-validation="required" data-validation-error-msg="Bạn chưa điền tiêu đề Quiz" name="quiz-title" type="text" class="form-control" placeholder="Nhập tiêu đê Quiz ở đây">
                </div>
                <div class="quiz-description">
                    <h3>Mô tả Quiz</h3>
                    <textarea name="quiz-desc" name="" class="form-control" placeholder="Nhập mô tả Quiz ở đây"></textarea>
                </div>
            </div>
            <!-- Divider -->
            <div class="create-divider text-center">
                <i class="fa fa-comment-o"></i>
            </div>
            <!-- QA -->
            <div class="quiz-qa">
                <!-- <div class="quiz-qa-box">
                    <div class="quiz-question">
                        <span>1</span>
                        <input name="question-title" type="text" class="form-control" placeholder="Nhập câu hỏi ở đây">
                        <i class="fa fa-times remove-mark remove-question"></i>
                    </div>
                    <ul class="quiz-answer">
                        <li class="quiz-answer-item">
                            <input type="text" class="form-control" placeholder="Câu trả lời 1">
                            <input type="radio" name="question-i-choice-y" hidden>
                            <i class="fa fa-check quiz-answer-check"></i>
                            <i class="fa fa-times remove-mark remove-answer"></i>
                        </li>
                        <li class="quiz-answer-item">
                            <input type="text" class="form-control" placeholder="Câu trả lời 2">
                            <input type="radio" name="question-i-choice-y" hidden>
                            <i class="fa fa-check quiz-answer-check"></i>
                            <i class="fa fa-times remove-mark remove-answer"></i>
                        </li>
                        <li class="quiz-answer-add">
                            <a href=""><i class="fa fa-plus"></i> Thêm câu trả lời</a>
                        </li>
                    </ul>
                </div> -->

                <div class="quiz-question-add">
                    <button class="btn btn-custom" type="button">
                        <i class="fa fa-plus"></i> Thêm câu hỏi
                    </button>
                </div>
            </div>
            <!-- Divider -->
            <div class="create-divider text-center">
                <i class="fa fa-pencil"></i>
            </div>
            <!-- Finish -->
            <div class="create-finish text-center">
                <h3>Cảm thấy không còn câu hỏi nữa?</h3>
                <button class="btn btn-custom" type="submit">Hoàn tất</button>
            </div>
        </form>
    </div>
</div>
