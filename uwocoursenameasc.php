<?php
    $query = "SELECT * FROM WesternCourses ORDER BY UWOCourseName ASC";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo"<tr>";
        echo "<td><a href='westerndetails.php?id=".$row["UWOCourseNum"]."'>".$row["UWOCourseNum"]."</a></td>";
        echo "<td>".$row["UWOCourseName"]."</td>";
        echo "<td>".$row["UWOWeight"]."</td>";
        echo "<td>".$row["Suffix"]."</td>";
        echo "<td><a href='westerneditform.php?id=".$row["UWOCourseNum"]."'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are You Sure You Would Like To Delete This Course, This course may be equivalent to other courses. The equivalences will also be deleted.');\" href='westerndelete.php?id=".$row["UWOCourseNum"]."'>Delete</a></td>";
        echo "</tr>";
    }
    mysqli_free_result($result);
?>
