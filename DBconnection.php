<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
    $dbname = "ecampus"; 
    $conn = mysqli_connect("127.0.0.1","root","",$dbname,"3306");
    
    //check
    if($conn -> connect_errno) {
        echo "Failed to connect to MySQL:".$conn->connect_error;
        exit();
    }
    
    ?>
</body>
</html>