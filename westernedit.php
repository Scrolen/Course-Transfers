<?php

include 'connecttodb.php';

$courseCode = $_POST["courseCode"];
$courseName = $_POST["courseName"];
$courseWeight = $_POST["courseWeight"];
$courseSuffix = $_POST["courseSuffix"];

$query = "UPDATE WesternCourses SET UWOCourseName = '".$courseName."', UWOWeight = '".$courseWeight."', Suffix = '".$courseSuffix."' WHERE UWOCourseNum = '".$courseCode."';";

if (!mysqli_query($connection, $query)){
    die("Error Editing course".mysqli_error($connection));
}else{
    header('Location: courses.php');
    exit;
}
?>

