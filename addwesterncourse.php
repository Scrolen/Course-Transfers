<?php

include 'connecttodb.php';

$courseCode = $_POST["courseCode"];
$courseName = $_POST["courseName"];
$courseWeight = $_POST["courseWeight"];
$courseSuffix = $_POST["courseSuffix"];
$check = 'SELECT * FROM WesternCourses WHERE UWOCourseNum = "'.$courseCode.'";';
$query = 'INSERT INTO WesternCourses(UWOCourseNum,UWOCourseName,UWOWeight,Suffix) VALUES("'.$courseCode.'", "'.$courseName.'","'.$courseWeight.'", "'.$courseSuffix.'");';



$result = mysqli_query($connection, $check);
if(!$result){
    die("Query Failed");
}else{
    if(mysqli_num_rows($result) > 0){
        echo "<h2>WARNING: THIS COURSE ALREADY EXISTS.</h2>";
        echo "<h3>Please Enter a NEW Course...</h3>";
        echo "<a href='adduwocourse.php'>Return</a><br>";
        echo "<a href='courses.php'>All Courses</a>";
    }else{
        if (!mysqli_query($connection, $query)){
            die("Error adding new course".mysqli_error($connection));
        }else{
            header('Location: courses.php');
            exit;
        }

    }
}

?>
