<?php
include 'connecttodb.php';

$course = $_GET['id'];

$query = 'DELETE FROM WesternCourses WHERE UWOCourseNum = "'.$course.'";';

$equivalent = 'DELETE FROM EquivalentTo WHERE UWOCourseNum = "'.$course.'";';

if (!mysqli_query($connection, $equivalent)){
    die("Error Deleting course".mysqli_error($connection));
}else{
    if (!mysqli_query($connection, $query)){
        die("Error Deleting course".mysqli_error($connection));
    }else{
        header('Location: courses.php');
        exit;
    }
    
}

?>
