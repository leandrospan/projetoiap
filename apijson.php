<?php
    //header('Access-Control-Allow-Origin: *');
     //header('Content-Type:application/json');
    //header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    //header('Access-Control-Allow-Methods:GET');
    header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

    $servername = "localhost";
    $username = "root";
    $password = "etec8";
    $dbname = "banco1";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM usu";
    $result = mysqli_query($conn, $sql);

    $usuarios = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }

    $json_usuarios = json_encode($usuarios);

    header('Content-Type: application/json');

    echo $json_usuarios;
?>