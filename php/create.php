<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/28/15
 * Time: 2:14 AM
 */
//var_dump();
echo '<pre>' . var_export($_POST, true) . '</pre>';

$quizTitle = $_POST['quiz-title'];
$quizDesc = $_POST['quiz-desc'];
$quizQuestions = $_POST['question'];
$quizAnswers = $_POST['answer'];
