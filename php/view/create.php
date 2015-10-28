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
                    <input name="quiz-title" type="text" class="form-control" placeholder="Nhập tiêu đê Quiz ở đây">
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

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/create.js"></script>
</body>
</html>
