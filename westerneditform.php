<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Edit Course</title>
   <link rel="stylesheet" href="western.css">
</head>
<body>

<h1>Edit Western Course</h1>

<form action="westernedit.php" method="post">

<?php
include 'connecttodb.php';

$course = $_GET['id'];
$suf = array("A/B", "Z", "F/G", "E", "");
$weights = array("0.5","1.0");
$query = 'SELECT * FROM WesternCourses WHERE UWOCourseNum = "'.$course.'";';

$result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed");
    }
$row = mysqli_fetch_assoc($result);

echo "Course Number: <input type='text' name='courseCode' value='".$row["UWOCourseNum"]."' readonly >";
echo "Course Name: <input type='text' name='courseName' id='' value='".$row["UWOCourseName"]."'> <br>";
echo "Course Weight: <select name='courseWeight' id='courseWeight'>";

foreach($weights as $weight){
    if($row["UWOWeight"] == $weight){
        echo "<option value='".$weight."' selected>".$weight."</option>";
    }else{
        echo "<option value='".$weight."'>".$weight."</option>";
    }
}

echo "</select> <br>";

echo "Course Suffix: <select name='courseSuffix' id='courseSuffix'>";

foreach($suf as $suff){
    if($row["Suffix"] == $suff){
        echo "<option value='".$suff."' selected>".$suff."</option>";
    }else{
        echo "<option value='".$suff."'>".$suff."</option>";
    }
}
echo "</select> <br>";

?>

    <input type="submit" value="Save">
</form>
    <a href="courses.php">Cancel</a>
    
</body>
</html>
