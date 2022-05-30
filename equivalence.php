<!DOCTYPE html>
<html lang="en">
<head>
    <title>Equivalence By Date</title>
    <link rel="stylesheet" href="western.css">

</head>
<body>
    <?php
    include 'connecttodb.php';
    $date = $_GET['id'];
    $query = "SELECT e.DateDecided,w.UWOCourseNum,w.UWOCourseName,w.UWOWeight,u.OfficialName,o.CourseName,o.CourseNum,o.Weight FROM WesternCourses as w, 
    OutsideCourses as o, EquivalentTo as e, University as u WHERE e.DateDecided <= '".$date."' AND
     u.UniversityNumber = o.UniversityNumber AND o.UniversityNumber = e.UniversityNumber AND o.CourseNum = e.CourseNum and w.UWOCourseNum = e.UWOCourseNum;";

    echo "<h2>Equivalencies Made Before and including $date </h2>";
    echo "<table>";
    echo "<tr>
    <th>Date of Equivalence</th>
    <th>UWO Course Name</th>
    <th>UWO Weight</th>
    <th>University Name</th>
    <th>Equivalent Course Name</th>
    <th>Equivalent Course Number</th>
    <th>Equivalent Course</th>
    <th>Weight</th>
    </tr>";
    

    $result = mysqli_query($connection, $query);
    if(!$result){
     die("Query Failed");
    }   
    while($row = mysqli_fetch_assoc($result)){
        echo"<tr>";
            echo "<td>".$row["DateDecided"]."</td>";
            echo "<td>".$row["UWOCourseNum"]."</td>";
            echo "<td>".$row["UWOCourseName"]."</td>";
            echo "<td>".$row["UWOWeight"]."</td>";
            echo "<td>".$row["OfficialName"]."</td>";
            echo "<td>".$row["CourseName"]."</td>";
            echo "<td>".$row["CourseNum"]."</td>";
            echo "<td>".$row["Weight"]."</td>";

        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);


    ?>

    <a href="courses.php">Return to All Courses</a>
    
</body>
</html>

