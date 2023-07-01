<html>
    <head>

    <title>
        Projects
    </title>

</head>

<style>

    /* TOP TITLE - BACKGROUND */
    #project_title_background {
        width: 600px;
        height: 100px;
        margin: auto;
        border: solid 2px;
    }

    /* DEPARTMENT LIST */
    #project_list_zone {
        width: 600px;
        height: 500px;
        margin: auto;
        margin-top: 20px;
        background-color: lightgray;
        border: solid 2px;
    }

    #project_list_background {
        width: 300px;
        height: auto;
        margin:auto;
        margin-top: 60px;
    }

    .topline {
        height: 50px;
        background-color: white;
        width : 600px;
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
        
        <div class="right"><h1>PROJECT LIST</h1>
    </div>

<div id="project_list_zone"> <!-- Project List Zone -->
    <div id = "project_list_background">  <!-- Project list background--->

        <table style="margin: auto; margin-top:10px; background-color: white" border="8" cellspacing="2" cellpadding="3">
            <tr>
                <th>PROJECT NAME</th>
            </tr>


            <?php
            include("DBconnection.php");

            if (isset($_POST)) {
                echo "";

                $query = "select pName
                          from project p
                          order by pName";
                $result = mysqli_query($conn, $query);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $projectName = $row["pName"];

                    echo "<tr>
                          <td style='text-align: center;'>$projectName</td>
                          <td style='text-align: center;'><a href='project_details.php?pName=$projectName'>View Details</a></td>
                          </tr>";
                }
            }
            ?>
        </table>
        
    </div>

</div>

</body>

</html>
