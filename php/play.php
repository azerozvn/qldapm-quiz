<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/28/15
 * Time: 2:14 AM
 */

require_once('load_view.php');
require_once('conn.php');

$data['title'] = "Quiz | Play";
if (!isset($_GET['link'])) {
    load_view('404', null);
    return;
} else {
    $playLink = $_GET['link'];
    $quizTitle = "";
    $quizDesc = "";
    $questionArray = array();
    $isExist = false;
    // Get quiz
    $sql = "SELECT * FROM quiz WHERE quiz.link = '". $playLink."'";
    foreach ($conn->query($sql) as $quizRow) {
        $quizTitle = $quizRow['title'];
        $quizDesc = $quizRow['description'];
        $quizId = $quizRow['id'];
        $isExist = true;
        // Get question
        $sql = "SELECT * FROM question WHERE quiz_id=" . $quizId;
        foreach ($conn->query($sql) as $questionRow) {

            $question = array();
            $questionId = $questionRow['id'];
            $question['id'] = $questionRow['id'];
            $question['title'] = $questionRow['title'];
            $question['right-answer-id'] = $questionRow['right_answer_id'];
            $question['answer-list'] = array();

            $sql = "SELECT * FROM answer WHERE question_id=".$questionId;
            foreach ($conn->query($sql) as $answerRow) {
                $question['answer-list'][$answerRow['id']]['id'] = $answerRow['id'];
                $question['answer-list'][$answerRow['id']]['title'] = $answerRow['title'];
            }

            $questionArray[$questionId] = $question;
        }
    }
    if(!$isExist){
      load_view('404', null);
      return;
    }

    $data['quiz-title'] = $quizTitle;
    $data['quiz-desc'] = $quizDesc;
    $data['quiz-question'] = $questionArray;
    load_view('play', $data);
}
