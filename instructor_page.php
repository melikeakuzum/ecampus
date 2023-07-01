<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

    <head>
        <title>
          Instructor Page
        </title>
    </head>

    <style>

        #ins_information_background {
            width : 1000px;
            height: 200px;
            background-color: lightgray;
            margin : auto;
            font-size: 30px;
            border: solid 2px;
            margin-top: 50px;
        }

        #ins_information {
            width: 800px;
            height: 140px ;
            margin: auto;
            margin-top: 8px;
            font-size: 18px;
            border: solid 1px #ccc
        }

        #buttons_zone {
            width: 220px;
            height: 400px;
            background-color: lightgray;
            margin-top: 12px;
            font-size: 18px;
            border: solid 2px;
        }

        #buttons_background {
            width: 200px;
            height: 350px;
            margin:auto;
            margin-top: 25px;
            border: solid 2px #ccc;
        }
        
        #buttons {
            width: 150px;
            height: 30px;
            background-color: black;
            margin-top: 12px;
            margin-left: 23px; 
            border: solid 2px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        #tables_zone {
            width: 760px;
            height: 400px;
            background-color: lightgray;
            margin-top: 12px;
            font-size: 18px;
            border: solid 2px;
        }

        #table_background {
            width: 680px;
            height: 350px;
            margin:auto;
            margin-top: 25px;
            border-radius: 15px;
        }
        
        .topline {
        height: 50px;
        background-color: white;
        width : 1000px;
        margin:auto;
        
        }

        .left{
            float: left;
            background-color: lightgray;
            padding: 15px 10px 5px 15px;
        }

        .right{
            text-align: center;
            padding: 5px;
            background-color: lightgray;
        }

    </style>

    <body style= "font-family : sans-serif; background-color: deeppink;">

    <div class="topline">
        <div class="left"><a href="homepage.php" ><img src="homeicon.png" width="40px" style=" padding: 10px;" title="home"></a></div>
        
        <div class="right"><h1>Instructor Page</h1>
    </div>

            
    </div>

    <div id ="ins_information_background"> <!-- instructor information background-->

        <div style="text-align: center; font-weight: bold; margin-top: 5px">
            
        </div>

        <div id="ins_information"> <!-- instructor informations-->
            <div style="padding-top: 8px; margin-left: 8px">
                <?php
                include("DBconnection.php");

                $query = "SELECT * FROM instructor WHERE ssn = '" . $_POST['issn'] . "'";
                $result = mysqli_query($conn, $query);

                if($result->num_rows>0) {
                    $row = mysqli_fetch_assoc($result);
                    $ssn = $row["ssn"];
                    $iname = $row["iname"];
                    $rankk = $row["rankk"];
                    $baseSal = $row["baseSal"];
                    $dName = $row["dName"];
                    $extraSalary = $row["extraSalary"];

                    echo "<span><strong>SSN:</strong> " . $ssn . " <br></span>";
                    echo "<span><strong>Instructor Name:</strong> " . $iname . " <br></span>";
                    echo "<span><strong>Rank:</strong> " . $rankk . " <br></span>";
                    echo "<span><strong>Base Salary:</strong> " . $baseSal . " <br></span>";
                    echo "<span><strong>Department Name:</strong> " . $dName . " <br></span>";
                    echo "<span><strong>Extra Salary:</strong> " . $extraSalary . " <br></span>";
                } else {
                    echo "<p>No instructor information available.</p>";
                }
                ?>
            </div>
        </div>            
    </div>

    <div style="width: 1000px; margin: auto; display: flex; justify-content: space-between"> <!-- Main Body (Buttons+Tables) -->

        <div id = "buttons_zone">  <!-- buttons zone -->
            <div id = "buttons_background"> <!-- buttons background -->


                <!-- buttons -->
                <div>
                    <button id="buttons" onclick="toggleDiv('table_weeklyschedule')">WEEKLY SCHEDULE</button>
                </div>

                <div>
                    <button id="buttons" onclick="toggleDiv('table_courses')">COURSES</button>
                </div>

                <div>
                    <button id="buttons" onclick="toggleDiv('table_students_advising')">STUDENTS ADVISING</button>
                </div>

                <div>
                    <button id="buttons" onclick="toggleDiv('table_students_supervising')">STUDENTS SUPERVISING</button>
                </div>

                <div>
                    <button id="buttons" onclick="toggleDiv('table_examlist')">EXAM LIST</button>
                </div>

                <div>
                    <button id="buttons" onclick="toggleDiv('table_freehours')">FREE HOURS</button>
                </div>

                <div>
                    <button id="buttons" onclick="toggleDiv('table_projects_leading')">PROJECTS LEADING</button>
                </div>

                <div>
                    <button id="buttons" onclick="toggleDiv('table_projects_working')">PROJECTS WORKING</button>
                </div>
            </div>
        </div>

        <div id = "tables_zone"> <!-- tables zone -->
            <div id="table_background">

            <div id="table_weeklyschedule" style="width: 660px; height: 350px; margin:fit-content; margin-top: -5px; display: none; overflow-x: auto; font-size: 12px;">
                  <!-- weekly schedule table -->
                  <h4 style="text-align: center; margin-top: 20px">WEEKLY SCHEDULE</h4>

                  <div style="width: auto;">
                    <table style="margin: auto; background-color: white; table-layout: fixed;" border="8" cellspacing="3" cellpadding="4">
                      <tr>
                        <th></th>
                        <?php
                        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                        foreach ($days as $day) {
                          echo "<th><font face='Arial, Helvetica, sans-serif'>$day</font></th>";
                        }
                        ?>
                      </tr>

                      <?php
                      include("DBconnection.php");

                      if (isset($_POST)) {
                        echo "";

                        $query = "SELECT ws.dayy AS 'DAY', ws.hourr AS 'HOUR', ws.courseCode AS 'COURSE CODE'
                                  FROM weeklyschedule ws
                                  WHERE ws.issn = '" . $_POST['issn'] . "'
                                  ORDER BY HOUR, DAY;";
                        $result = mysqli_query($conn, $query);

                        $schedule = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                          $day = $row["DAY"];
                          $hour = $row["HOUR"];
                          $courseCode = $row["COURSE CODE"];

                          $schedule[$hour][$day] = $courseCode;
                        }

                        for ($i = 1; $i <= 13; $i++) {
                          echo "<tr>";
                          echo "<td style='text-align: center;'>$i</td>";
                          foreach ($days as $day) {
                            $courseCode = isset($schedule[$i][$day]) ? $schedule[$i][$day] : "";
                            echo "<td style='text-align: center;'>$courseCode</td>";
                          }
                          echo "</tr>";
                        }
                      }
                      ?>
                    </table>
                  </div>
                </div>







                <div id="table_courses" style="width: 660px; height: 350px; margin:auto; margin-top: -25px; display: none"> <!-- course table -->
                    <h4 style="text-align: center; margin-top: 50px">COURSES</h4>

                    <table style="margin: auto; background-color: white" border="8" cellspacing="3" cellpadding="4">
                        <tr>
                            <th>COURSE CODE</th>
                            <th>COURSE NAME</th>
                            <th>SECTION</th>
                        </tr>

                        <?php
                        include("DBconnection.php");

                        if (isset($_POST)) {
                            echo "";

                            $query = "SELECT distinct e.courseCode, c.courseName, e.sectionId
                                         FROM enrollment e, course c
                                         WHERE e.courseCode = c.courseCode AND e.issn = '" . $_POST['issn'] . "' AND e.courseCode = c.courseCode;";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $coursecode = $row["courseCode"];
                                $coursename = $row["courseName"];
                                $sectionId = $row["sectionId"];

                                echo "<tr>
                                <td style='text-align: center;'><a href='students_takes_course.php?courseCode=" . $coursecode . "&courseName=" . $coursename . "&sectionId=" . $sectionId . " ' target='_blank'>" . $coursecode . "</a></td>";
                                echo "<td style='text-align: center;'>" . $coursename . "</td>";
                                echo "<td style='text-align: center;'>" . $sectionId . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>

                    </table>
                </div>

                <div id="table_students_advising" style="width: 660px; height: 350px; margin:auto; margin-top: -25px; display: none"> <!-- student advising table -->
                    <h4 style="text-align: center; margin-top: 50px">STUDENTS ADVISING</h4>

                    <table style="margin: auto; background-color: white" border="8" cellspacing="3" cellpadding="4">
                        <tr>
                            <th>SSN</th>
                            <th>Grad or Ugrad</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                        </tr>

                        <?php
                        include("DBconnection.php");

                        $query = "SELECT ssn, gradorUgrad, studentid, studentname FROM student WHERE advisorSsn = '" . $_POST['issn'] . "'";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $ssn = $row["ssn"];
                            $gradorUgrad = $row["gradorUgrad"];
                            $studentid = $row["studentid"];
                            $studentname = $row["studentname"];

                            echo "<tr>
                            <td style='text-align: center;'>" . $ssn . "</td>
                            <td style='text-align: center;'>" . $gradorUgrad . "</td>
                            <td style='text-align: center;'>" . $studentid . "</td>
                            <td style='text-align: center;'>" . $studentname . "</td>
                            </tr>";
                        }
                        ?>

                    </table>
                </div>

                <div id="table_students_supervising" style="width: 660px; height: 350px; margin:auto; margin-top: -25px; display: none"> <!-- student supervising table -->
                    <h4 style="text-align: center; margin-top: 50px">GRADUATE STUDENTS LIST OF SUPERVISING</h4>

                    <table style="margin: auto; background-color: white" border="8" cellspacing="3" cellpadding="4">
                        <tr>
                            <th>SSN</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                        </tr>

                        <?php
                        include("DBconnection.php");

                        $query = "SELECT s.ssn, s.studentid, s.studentname
                                 FROM student s, gradstudent gs
                                  WHERE s.ssn = gs.ssn AND gs.supervisorSsn = '" . $_POST['issn'] . "'";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $ssn = $row["ssn"];
                            $studentid = $row["studentid"];
                            $studentname = $row["studentname"];

                            echo "<tr>
                             <td style='text-align: center;'>" . $ssn . "</td>
                             <td style='text-align: center;'>" . $studentid . "</td>
                             <td style='text-align: center;'>" . $studentname . "</td>
                             </tr>";
                        }
                        ?>

                    </table>
                </div>

                <div id="table_examlist" style="width: 660px; height: 350px; margin:auto; margin-top: -25px;display: none"> <!-- examlist table -->
                    <h4 style="text-align: center; margin-top: 50px">Exam List</h4>

                    <table style="margin: auto; background-color: white" border="8" cellspacing="3" cellpadding="4">
                        <tr>
                            <th>Exam Name</th>
                            <th>Date</th>
                            <th>Course Code</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Section ID</th>
                        </tr>

                        <?php
                        include("DBconnection.php");

                        $query = "SELECT eos.examname, eos.date, eos.courseCode, eos.yearr, eos.semester, eos.sectionId
                                  FROM examofsection eos
                                  WHERE eos.issn = '" . $_POST['issn'] . "' ";

                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $examname = $row["examname"];
                            $date = $row["date"];
                            $courseCode = $row["courseCode"];
                            $yearr = $row["yearr"];
                            $semester = $row["semester"];
                            $sectionId = $row["sectionId"];

                            echo "<tr>
                             <td style='text-align: center;'><a href=\"exam_grades.php?examname=" . urlencode($examname) . "&date=" . urlencode($date) . "&courseCode=" . urlencode($courseCode) . "&yearr=" . urlencode($yearr) . "&semester=" . urlencode($semester) . "&sectionId=" . urlencode($sectionId) . "\" target=\"_blank\">" . $examname . "</a></td>
                              <td style='text-align: center;'>" . $date . "</td>
                              <td style='text-align: center;'>" . $courseCode . "</td>
                               <td style='text-align: center;'>" . $yearr . "</td>
                               <td style='text-align: center;'>" . $semester . "</td>
                                <td style='text-align: center;'>" . $sectionId . "</td>
                            </tr>";
                        }

                        mysqli_close($conn);
                        ?>

                    </table>
                </div>

               <div id="table_freehours" style="width: 660px; height: 350px; margin:auto; margin-top: -25px; display: none; overflow-x: auto;">
                  <!-- freehours table -->
                  <h4 style="text-align: center; margin-top: 50px">FREE HOURS</h4>
                  <table style="margin: auto; background-color: white" border="8" cellspacing="1" cellpadding="0.5">
                    <tr>
                      <th>DAY</th>
                      <?php
                      for ($i = 1; $i <= 13; $i++) {
                        echo "<th>$i</th>";
                      }
                      ?>
                    </tr>

                    <?php
                    include("DBconnection.php");

                    if (isset($_POST)) {
                      echo "";

                      $query = "select t.dayy, t.hourr
                                from timeslot t
                                where (t.dayy,t.hourr) not in(
                                  select dayy,hourr
                                  from weeklyschedule ws
                                  where ws.issn = '" . $_POST['issn'] . "'
                                )
                                order by dayy,hourr;";
                      $result = mysqli_query($conn, $query);

                      $freeHours = array();
                      while ($row = mysqli_fetch_assoc($result)) {
                        $day = $row["dayy"];
                        $hour = $row["hourr"];

                        $freeHours[$day][$hour] = true;
                      }

                      $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                      foreach ($days as $day) {
                        echo "<tr>";
                        echo "<td style='text-align: center;'>$day</td>";
                        for ($i = 1; $i <= 13; $i++) {
                          $hour = isset($freeHours[$day][$i]) ? '' : '<span style="color: red">&#10060;</span>';
                          echo "<td style='text-align: center;'>$hour</td>";
                        }
                        echo "</tr>";
                      }
                    }
                    ?>
                  </table>
                </div>


                <div id="table_projects_leading" style="width: 660px; height: 350px; margin:auto; margin-top: -25px; display: none"> <!-- projects leading table -->
                    <h4 style="text-align: center; margin-top: 50px">PROJECT LIST OF LEADING</h4>
                    <table style="background-color: white" border="8" cellspacing="3" cellpadding="4">
                        <tr>

                            <th>Project Name</th>
                            <th>Subject</th>
                            <th>Budget</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Controlling Department Name</th>
                        </tr>

                        <?php
                        include("DBconnection.php");

                        $query = "SELECT P.pName, P.subject, P.budget, P.startDate, P.enddate, P.controllingDName FROM project P WHERE P.leadSsn = '" . $_POST['issn'] . "'";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {

                            $pName = $row["pName"];
                            $subject = $row["subject"];
                            $budget = $row["budget"];
                            $startDate = $row["startDate"];
                            $endDate = $row["enddate"];
                            $controllingDName = $row["controllingDName"];

                            echo "<tr>
                             <td style='text-align: center;'>" . $pName . "</td>
                             <td style='text-align: center;'>" . $subject . "</td>
                             <td style='text-align: center;'>" . $budget . "</td>
                             <td style='text-align: center;'>" . $startDate . "</td>
                             <td style='text-align: center;'>" . $endDate . "</td>
                             <td style='text-align: center;'>" . $controllingDName . "</td>
                            </tr>";
                        }
                        ?>

                    </table>
                </div>

                <div id="table_projects_working" style="width: 660px; height: 350px; margin:auto; margin-top: -25px; display: none"> <!-- projects working table -->
                    <h4 style="text-align: center; margin-top: 50px">PROJECT LIST OF ON WORKING</h4>

                    <table style="margin: auto; background-color: white" border="8" cellspacing="3" cellpadding="4">
                        <tr>
                            <th>Lead SSN</th>
                            <th>Project Name</th>
                            <th>ISSN</th>
                            <th>Working Hours</th>
                        </tr>

                        <?php
                        include("DBconnection.php");

                        $query = "SELECT * FROM project_has_instructor WHERE issn = '" . $_POST['issn'] . "'";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $leadSsn = $row["leadSsn"];
                            $pName = $row["pName"];
                            $issn = $row["issn"];
                            $workinghour = $row["workinghour"];

                            echo "<tr>
                                <td style='text-align: center;'>" . $leadSsn . "</td>
                                <td style='text-align: center;'>" . $pName . "</td>
                                <td style='text-align: center;'>" . $issn . "</td>
                                <td style='text-align: center;'>" . $workinghour . "</td>
                              </tr>";
                        }
                        ?>

                    </table>
                </div>

            </div>
        </div>   

    </div>

</body>


<!-- some basic js codes -->
<script>
    var visibleDivId = null;

    window.onload = function () {
        hideAllDivs();
    };

    function toggleDiv(divId) {
        if (visibleDivId === divId) {
            hideDiv(divId);
        } else {
            showDiv(divId);
        }
    }

    function showDiv(divId) {
        if (visibleDivId !== null) {
            hideDiv(visibleDivId);
        }
        var div = document.getElementById(divId);
        div.style.display = "block";
        visibleDivId = divId;
    }

    function hideDiv(divId) {
        var div = document.getElementById(divId);
        div.style.display = "none";
        visibleDivId = null;
    }

    function hideAllDivs() {
        var divs = document.getElementsByClassName("box");
        for (var i = 0; i < divs.length; i++) {
            divs[i].style.display = "none";
        }
        visibleDivId = null;
    }
</script>

</html>
