<?php
include("DBconnection.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="homepage.css">
</head>




    <body style="background-color: deeppink ;">
        <!-- bu kısım havalı bir ecampus yazısı oluşturmak için -->
    <div class="page">
        <div class="animation">
            <div class="box" id="box1">e</div>
            <div class="box" id="box2">C</div>
            <div class="box" id="box3">A</div>
            <div class="box" id="box4">M</div>
            <div class="box" id="box5">P</div>
            <div class="box" id="box6">U</div>
            <div class="box" id="box7">S</div>
        </div>

        <!-- bu kısımı kullanıcının gitmek istediği sayfada doğru verileri gösterebilmek için, kullanıcıdan gerekli inputu alıyoruz a -->
        <div class="form-container">
            <div id="list">
                <ul>
                    <li>
                        <button onclick="showPage('studentPage')">Student Page</button>
                    </li>
                    <li>
                        <button onclick="showPage('instructorPage')">Instructor Page</button>
                    </li>
                    <li>
                        <form action="departments_page.php" method="post">
                            <input type="submit" style="width: 150px;
                                height: 40px;
                                border: solid 2px;
                                margin-left: 10px" value="Department List">
                            </form>                                          
                        </li>
                        <li>
                            <form action="projects_page.php" method="post">
                                <input type="submit" style="width: 150px;
                                height: 40px;
                                border: solid 2px;
                                margin-left: 10px" value="Project List">
                            </form>     
                        </li>
                    </ul>
                </div>

                <div class="boxright" id="studentPage" style="display: none;">
                <form action="student_page.php" method="post">
                    <h2>Student Page:</h2>
                    <input type="text" required name="ssn" placeholder="Enter student ssn">
                        <input style = "width: 80px; height: 30px; font-size: 16px; font-weight: bold; text-align: center; margin-left: 120px; border: solid 2px; border-radius: 5px; background-color: white" 
                               type="submit" name="gonder" value="LOGIN">
                            </form>
                            </div>

                            <div class="boxright" id="instructorPage" style="display: none;">
                                <form action="instructor_page.php" method="post">
                                    <h2>Instructor Page:</h2>
                                    <input type="text" required name="issn" placeholder="Enter instructor ssn">
                                        <input style = "width: 80px; height: 30px; font-size: 16px; font-weight: bold; text-align: center; margin-left: 120px; border: solid 2px; border-radius: 5px; background-color: white" 
                                               type="submit" name="gonder" value="LOGIN">
                                            </form>
                                            </div>

                                            </div>
                                            </div>

                                            <script>
                                                var currentPage = "";

                                                function showPage(pageId) {
                                                    if (currentPage !== "") {
                                                        document.getElementById(currentPage).style.display = "none";
                                                    }

                                                    document.getElementById(pageId).style.display = "block";
                                                    currentPage = pageId;
                                                }
                                            </script>
                                            </body>
                                            </html>
