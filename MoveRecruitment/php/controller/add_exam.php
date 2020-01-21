<?php

require_once "../model/exam.php";
include_once '../model/exam_type.php';

$examData = $_POST['examData'];
$newExamType = $_POST['newExamType'];
$lectureID = $_POST['lectureID'];

if (!empty($examData) && !empty($newExamType) && !empty($lectureID)) {
    $exam = new exam();
    if ($newExamType == "false") {
        $data = array($examData[0], $lectureID);
        $result = $exam->create($data);
        echo $result;
    } else {
        $exam_type = new exam_type();
        $data = array($examData[0], $examData[1], $examData[2]);
        $result = $exam_type->create($data);
        if ($result != 0) {
            $data = array($result, $lectureID);
            $result = $exam->create($data);
        }
        echo $result;
    }
} else {
    echo "Please, fill all fields!";
}