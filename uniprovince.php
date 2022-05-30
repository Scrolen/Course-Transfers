
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Universities</title>
       <link rel="stylesheet" href="western.css">
</head>
<body>

<h1>Universities</h1>

<table>
<tr>
    <th>University Name</th>
    <th>Nick Name</th>
</tr>

<?php
include 'connecttodb.php';

    $province = $_GET['id'];
    $query = "SELECT OfficialName, Nickname FROM University WHERE Province = '".$province."';";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo"<tr>";
        echo "<td>".$row["OfficialName"]."</td>";
        echo "<td>".$row["Nickname"]."</td>";
    
        echo "</tr>";
    }
    mysqli_free_result($result);
    
    ?>
    
    </table>
    
    <a href="courses.php">Back to All Courses</a>
    
</body>
</html>
