<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/28/15
 * Time: 2:14 AM
 */

require_once('vn_string-filter.php');
require_once('load_view.php');
require_once('conn.php');


if (!isset($_POST['quiz-title'])) {
    load_view('create', null);
    return;
}

$quizTitle = $_POST['quiz-title'];
$quizDesc = $_POST['quiz-desc'];
$quizQuestions = $_POST['question'];
$quizAnswers = $_POST['answer'];
$quizRightAnswers = $_POST['right-answer'];
$quizTitleFilted = str_replace(" ", "-", mb_strtolower(vn_str_filter($quizTitle).));

// Create transaction
$conn->beginTransaction();
// Create a quiz in database
$sql = "INSERT INTO quiz(title, description) VALUE('" . $quizTitle . "','" . $quizDesc . "')";
if ($conn->query($sql) === false) {
    return;
} else {

    $quizId = $conn->lastInsertId();
    $quizTitleFilted = $quizTitleFilted . "-" . $quizId;
    $data['PLAY-LINK'] = $quizTitleFilted;
    $_SESSION['PLAY-LINK'] = $quizTitleFilted;
    // Update link of quiz.
    $sql = "UPDATE quiz SET link='" . $quizTitleFilted . "' WHERE id=" . $quizId;
    if ($conn->query($sql) === false) {
        return;
    }

    // insert quiz's questions
    for ($i = 1; $i <= count($quizQuestions); $i++) {
        $questionTitle = $quizQuestions[$i];
        $rightAnswers = $quizRightAnswers[$i];
        $questionAnswer = $quizAnswers[$i];

        // Create quiz question
        $sql = "INSERT INTO question(quiz_id,title) VALUE(" . $quizId . ",'" . $questionTitle . "')";
        if ($conn->query($sql) !== false) {
            $questionId = $conn->lastInsertId();

            // INSERT question answer list
            for ($j = 1; $j <= count($questionAnswer); $j++) {
                $answerTitle = $questionAnswer[$j];
                $sql = "INSERT answer(question_id,title) VALUE (" . $questionId . ",'" . $answerTitle . "')";
                $conn->query($sql);

                if ($j == $rightAnswers) {
                    $rightAnserId = $conn->lastInsertId();
                    $sql = "UPDATE question SET right_answer_id=" . $rightAnserId . " WHERE id=" . $questionId;
                    if($conn->query($sql)===false){
                        return;
                    };
                }
            }
        }
        else{
            return;
        }

    }
}
// commit transaction if everything is ok.
$conn->commit();
$conn = null;
load_view('create_success', $data);
