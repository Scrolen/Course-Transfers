<!DOCTYPE html>
<html lang="en">
<head>
    <title>University Courses</title>
    <link rel="stylesheet" href="western.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>
<body>
    <?php
        include 'connecttodb.php';
    ?>

    <div id="WesternTable">
        <h1>Western Courses</h1>
        <form action="" method="post">
	<h4>Sort By: </h4>
        <input type="radio" name="sort" id="numb" value="numb">
        <label for="numb">Course Number</label>

        <input type="radio" name="sort" id="name" value="name">
        <label for="name">Course Name</label>

         <h4>  Order: </h4>
        <input type="radio" name="order" id="asc" value="asc">
        <label for="asc">Ascending</label>

        <input type="radio" name="order" id="des" value="des">
        <label for="des">Descending</label>

        <button id="refresh">Refresh</button>

        </form>
        <table>
        <tr>
        <th>Course Number</th>
        <th>Course Name</th>
        <th>Weight</th>
        <th>Suffix</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
        <?php

        $sortBy = $_POST['sort'];
        $orderBy = $_POST['order'];

        if ($sortBy == "numb" && $orderBy == "asc"){
        include 'connecttodb.php';
        include 'uwocoursenumbasc.php';

        }else if ($sortBy == "numb" && $orderBy == "des"){
        include 'connecttodb.php';
        include 'uwocoursenumbdes.php';

        }else if ($sortBy == "name" && $orderBy == "asc"){
        include 'connecttodb.php';
        include 'uwocoursenameasc.php';

        }else if ($sortBy == "name" && $orderBy == "des"){
        include 'connecttodb.php';
        include 'uwocoursenamedes.php';

        }else {
        include 'connecttodb.php';
        include 'getwesterncourses.php';
        }

        ?>

        </table>


        <br>

        <a class="home" href="adduwocourse.php">Add Western Course</a>
        <a class="home" href="newequivalence.php">Make New Equivalence</a>
    </div>

    <div class="other">
    <h1>Other Universities Ordered by Province</h1>
    <table>
        <tr>
        <th>Province</th>
        <th>University Name</th>
        </tr>
        <?php
        include 'connecttodb.php';
        $query = "SELECT * FROM University ORDER BY Province;";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed");
        }
        while($row = mysqli_fetch_assoc($result)){
            echo"<tr>";
            echo "<td><a href='universitydetails.php?id=".$row["UniversityNumber"]."'>".$row["OfficialName"]."</a></td>";
            echo "<td>".$row["Province"]."</td>";
            echo "</tr>";
        }
        mysqli_free_result($result);
        ?>

    </table>
    </div>
<div class="line">
    <div>
    <h2>Select A Province to See it's Universities</h2>
    <ul>
    <li><a href="uniprovince.php?id=ON">Ontario</a></li>
    <li><a href="uniprovince.php?id=BC">British Columbia</a></li>
    <li><a href="uniprovince.php?id=QB">Quebec</a></li>
    <li><a href="uniprovince.php?id=NL">Newfound Land</a></li>
    <li><a href="uniprovince.php?id=NS">Nova Scotia</a></li>
    <li><a href="uniprovince.php?id=NB">New Brunswick</a></li>
    <li><a href="uniprovince.php?id=MB">Manitoba</a></li>
    <li><a href="uniprovince.php?id=SK">Saskatchewan</a></li>
    <li><a href="uniprovince.php?id=NS">Alberta</a></li>
    </ul>
    </div>

    <div>
    <h2>Universities With No Courses</h2>
    <table>
    <tr>
    <th>University Name</th>
    <th>Nick Name</th>
    <?php
    $query = "SELECT * FROM University WHERE UniversityNumber NOT IN (Select UniversityNumber FROM OutsideCourses);";
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
    </tr>
    </table>
    </div>

    <div>
    <h2>View Equivalences By Date</h2>
    <ul>
    <?php
    $query = "SELECT DateDecided From EquivalentTo ORDER BY DateDecided ASC;";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo"<li><a href='equivalence.php?id=".$row["DateDecided"]."'>".$row["DateDecided"]."</a></li>";
    }
    mysqli_free_result($result);
    ?>

    </ul>
    </div>

</div>


 <?php
   mysqli_close($connection); // CLOSING CONNECTION TO DATABASE
	
 ?>
</body>
</html>
