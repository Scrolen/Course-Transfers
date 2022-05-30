<!DOCTYPE html>
<html lang="en">
<head>
    <title>University Details</title>
    <link rel="stylesheet" href="western.css">
</head>
<body>

<h2>University Details</h2>
<?php
include 'connecttodb.php';

$uniNum = $_GET['id'];
$query = "SELECT * FROM University WHERE UniversityNumber = '".$uniNum."';";
$courses = "SELECT CourseName, CourseNum FROM OutsideCourses WHERE UniversityNumber = '".$uniNum."';";

$result2 = mysqli_query($connection, $courses);
$result = mysqli_query($connection, $query);
if(!$result){
    die("Query Failed");
}else{
    $row = mysqli_fetch_assoc($result);
    echo "<p>University Number: ".$row["UniversityNumber"]."</p>";
    echo "<p>Official Name: ".$row["OfficialName"]."</p>";
    echo "<p>City: ".$row["City"]."</p>";
    echo "<p>Province: ".$row["Province"]."</p>";
    echo "<p>Nick Name: ".$row["Nickname"]."</p>";

    echo "<h4>Courses Offered:</h4>";
    echo "<ul>";
    while($rows = mysqli_fetch_assoc($result2)){
        echo "<li> ".$rows["CourseNum"]." , ".$rows["CourseName"]."</li>";
    }
    echo "</ul>";
    mysqli_free_result($result);
}

?>


    <a href="courses.php">Back to All Courses</a>
</body>
</html>
