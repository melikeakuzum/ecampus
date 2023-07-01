<html>
    <head>
    <title>
        Exam Grades
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

        $examname = $_GET['examname'];
        $date = $_GET['date'];
        $courseCode = $_GET['courseCode'];
        $yearr = $_GET['yearr'];
        $semester = $_GET['semester'];
        $sectionId = $_GET['sectionId'];
        $issn = isset($_GET['issn']) ? $_GET['issn'] : '';

        $query = "SELECT g.sssn as 'Student SSN', sum(g.pointsEarned) as 'Total Point'
                            FROM examofsection e
                            JOIN gradesperquestion g on e.examname = g.examname and e.courseCode = g.courseCode and g.yearr = e.yearr and g.semester = e.semester and g.sectionId = e.sectionId and g.issn = e.issn
                            where e.courseCode = '" . $courseCode . "' and e.examname = '" . $examname . "'
                            group by g.sssn";

        $result = mysqli_query($conn, $query);

        echo "<h2>EXAM RESULTS OF : " . $courseCode . " - " . $examname . "</h2>";

        echo "<table style='margin: auto; background-color: white' border='8' cellspacing='3' cellpadding='4'>
            <tr>
                <th>Student SSN</th>
                <th>Grade</th>
            </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $ssn = $row["Student SSN"];
            $grade = $row["Total Point"];

            echo "<tr>
                    <td>" . $ssn . "</td>
                    <td>" . $grade . "</td>
                </tr>";
        }
        mysqli_close($conn);
        ?>

    </div>

</div>

</body>

</html>

