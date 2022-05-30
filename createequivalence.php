<?php

include 'connecttodb.php';

$uwoCourse = $_POST["uwoCourse"];
$outsideCourse = $_POST["outCourse"];
$outCourse_explode = explode('|',$outsideCourse);
$outCourse = $outCourse_explode[0];
$uniNum = $outCourse_explode[1];
$date = date("Y-m-d");

$check = 'SELECT * FROM EquivalentTo WHERE UWOCourseNum = "'.$uwoCourse.'" AND CourseNum = "'.$outCourse.'";';
$query = 'INSERT INTO EquivalentTo(UWOCourseNum,CourseNum,UniversityNumber,DateDecided) VALUES("'.$uwoCourse.'", "'.$outCourse.'","'.$uniNum.'", "'.$date.'");';

$update = "UPDATE EquivalentTo SET DateDecided = '".$date."' WHERE UWOCourseNum = '".$uwoCourse."' AND CourseNum = '".$outCourse."';";

$result = mysqli_query($connection, $check);





if(!$result){
    die("Query Failed");
}else{
    if(mysqli_num_rows($result) > 0){
        

        if (!mysqli_query($connection,$update)){
            die("Error adding new course".mysqli_error($connection));
        }else{
            echo "Equivalence Added!";
            echo "<a href='courses.php'>Return to All Courses</a>";
            exit;
        }






    }else{
        if (!mysqli_query($connection, $query)){
            die("Error adding new course".mysqli_error($connection));
        }else{
            echo "Equivalence Added!";
            echo "<a href='courses.php'>Return to All Courses</a>";
            exit;
        }

    }
}

?>

