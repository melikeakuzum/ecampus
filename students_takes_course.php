<html>
    <head>
    <title>
        Student List
    </title>
</head>

<style>

    #general_structure {
        width: 800px;
        height: 600px;
        margin: auto;
        margin-top: 35px;
        background-color: #B7D7D8;
        border: solid 2px;
        border-radius: 15px;
    }

</style>

<body style="font-family : sans-serif; background-color: #204E5F">

<div id="general_structure">

    <div style="text-align: center">
        <?php
        include("DBconnection.php");

        if (isset($_GET['courseCode']) && isset($_GET['courseName']) && isset($_GET['sectionId'])) {
            $courseCode = $_GET['courseCode'];
            $courseName = $_GET['courseName'];
            $sectionId = $_GET['sectionId'];

            echo "<h2>STUDENT LIST FOR : " . $courseCode . "." . $sectionId . " - " . $courseName . "</h2>";

            $query = "SELECT s.studentname
                      FROM enrollment e, student s
                      WHERE e.courseCode = '" . $courseCode . "' AND e.sectionId = '" . $sectionId . "' AND e.sssn = s.ssn";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<table style='margin: auto; background-color: white' border='8' cellspacing='3' cellpadding='4'>
                <tr>
                    <th style = 'format-weight: bold;'>STUDENT NAME</th>
                </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $studentName = $row["studentname"];
                    echo "<tr>
                    <td>" . $studentName . "</td>
                </tr>";
                }

                echo "</table>";
            } else {
                echo "No students enrolled.";
            }
        }
        ?>
    </div>

</div>

</body>

</html>

