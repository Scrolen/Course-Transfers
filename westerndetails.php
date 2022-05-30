<!DOCTYPE html>
<html lang="en">
<head>
    <title>Western Course Details</title>
    <link rel="stylesheet" href="western.css">

</head>
<body>

<table>

<h2>Course Equivalences</h2>
<tr>
    <th>Western Course</th>
    <th>UWO Course Name</th>
    <th>UWO Weight</th>
    <th>University Name</th>
    <th>Equivalent Course Name</th>
    <th>Equivalent Course Number</th>
    <th>Equivalent Course Weight</th>
    <th>Date of Equivalence</th>

    </tr>
<?php
include 'connecttodb.php';

$course = $_GET['id'];
$query = "SELECT w.UWOCourseNum,w.UWOCourseName,w.UWOWeight,u.OfficialName,o.CourseName,o.CourseNum,o.Weight, e.DateDecided FROM WesternCourses as w, 
        OutsideCourses as o, EquivalentTo as e, University as u WHERE w.UWOCourseNum = '".$course."' AND e.UWOCourseNum = '".$course."' AND
         u.UniversityNumber = e.UniversityNumber AND o.UniversityNumber = e.UniversityNumber AND o.CourseNum = e.CourseNum;";
$result = mysqli_query($connection, $query);
if(!$result){
    die("Query Failed");
}
while($row = mysqli_fetch_assoc($result)){
    echo"<tr>";
    echo "<td>".$row["UWOCourseNum"]."</td>";
    echo "<td>".$row["UWOCourseName"]."</td>";
    echo "<td>".$row["UWOWeight"]."</td>";
    echo "<td>".$row["OfficialName"]."</td>";
    echo "<td>".$row["CourseName"]."</td>";
    echo "<td>".$row["CourseNum"]."</td>";
    echo "<td>".$row["Weight"]."</td>";
    echo "<td>".$row["DateDecided"]."</td>";

    echo "</tr>";
}
mysqli_free_result($result);

?>

</table>

<a href="courses.php">Back to All Courses</a>

</body>
</html>
