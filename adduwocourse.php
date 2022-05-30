<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Western Course</title>
   <link rel="stylesheet" href="western.css">
</head>
<body>

    <h1>Add A New Western Course</h1>

    <form action="addwesterncourse.php" method="post"> <br>
        Course Number: <input type="text" name="courseCode" pattern="cs[0-9]{4}" title="Invalid Course Number. Must start with cs followed by 4 numbers" required>
        Course Name: <input type="text" name="courseName" id="" required> <br>
        Course Weight: <select name="courseWeight" id="courseWeight" required>
                        <option value="0.5">0.5</option>
                        <option value="1.0">1.0</option>
                        </select> <br>
        Course Suffix: <select name="courseSuffix" id="courseSuffix" required>
                        <option value="A/B">A/B</option>
                        <option value="Z">Z</option>
                        <option value="F/G">F/G</option>
                        <option value="E">E</option>
                        <option value="">None</option>
                        </select> <br>

        <input type="submit" value="Click To Add Course">
    </form>
    <a href="courses.php">All Courses</a>
    
</body>
</html>
