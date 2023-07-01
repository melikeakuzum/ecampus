<html>
    <head>

    <title>
        Departments
    </title>

</head>

<style>

   

    /* DEPARTMENT LIST */
    #department_list_zone {
        width: 600px;
        height: 500px;
        margin: auto;
        margin-top: 20px;
        background-color: lightgray;
        border: solid 2px;
    }

    #department_list_background {
        width: 300px;
        height: 455px;
        margin:auto;
        margin-top: 80px;
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
        
        <div class="right"><h1>DEPARTMENT LIST</h1>
    </div>



<div id="department_list_zone"> <!-- Department List Zone -->
    <div id = "department_list_background">  <!-- department list background--->

        <table style="margin: auto; margin-top:10px; background-color: white" border="8" cellspacing="2" cellpadding="3">
            <tr>
                <th>DEPARTMENT NAME</th>
            </tr>


            <?php
            include("DBconnection.php");

            if (isset($_POST)) {
                echo "";

                $query = "select dName
                          from department d
                          order by dName";
                $result = mysqli_query($conn, $query);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $departmentName = $row["dName"];

                    echo "<tr>
                          <td style='text-align: center;'>$departmentName</td>
                          <td style='text-align: center;'><a href='department_details.php?dName=$departmentName'>View Details</a></td>
                          </tr>";
                }
            }
            ?>
        </table>
        
    </div>

</div>

</body>

</html>
