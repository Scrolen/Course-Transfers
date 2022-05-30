<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Equivalence</title>
    <link rel="stylesheet" href="western.css">
</head>
<body>

<h2>Create New Equivalence</h2>
<form action="createequivalence.php" method="post">

<?php
include 'connecttodb.php';

$uwoCourses = "SELECT UWOCourseNum, UWOCourseName FROM WesternCourses;";
$outsideCourses = "SELECT CourseNum, CourseName, UniversityNumber FROM OutsideCourses;";

$outresult = mysqli_query($connection, $outsideCourses);
    if(!$outresult){
        die("Query Failed");
    }

$uworesult = mysqli_query($connection, $uwoCourses);
    if(!$uworesult){
        die("Query Failed");
    }

echo "UWO Course: <select name='uwoCourse' id='uwoCourse'>";
    while($uworow = mysqli_fetch_assoc($uworesult)){
        echo "<option value='".$uworow["UWOCourseNum"]."' selected>".$uworow["UWOCourseNum"].", ".$uworow["UWOCourseName"]."</option>";
    }
    echo "</select> <br>";

echo "Outside Course: <select name='outCourse' id='outCourse'>";
    while($outrow = mysqli_fetch_assoc($outresult)){
        echo "<option value='".$outrow["CourseNum"]."|".$outrow["UniversityNumber"]."' selected>".$outrow["CourseNum"].", ".$outrow["CourseName"]."</option>";
    }
    echo "</select> <br>";

mysqli_free_result($uworesult);
mysqli_free_result($outresult);

?>

<input type="submit" value="Create Equivalence">



</form>

<a href="courses.php">Return to All Courses</a>
</body>
</html>
