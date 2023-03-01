<?php 
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $host = "localhost";
    $username = "root";
    $password = "etec8";
    $bdnome = "banco1";
    $conn = mysqli_connect($host, $username, $password, $bdnome);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);


    $sql = "SELECT * FROM usu WHERE usuario = '$usuario' AND senha = '$senha'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        echo '<script> alert("ACESSO PERMITIDO!!!"); </script>';
    } else {
        echo '<script> alert("ACESSO NEGADO!!!"); </script>';
        echo "<script> document.location.href='index.php' </script>";
    }

    mysqli_close($conn);

    /*
    if(($usuario === "leandro") && ($senha === "123")) {
        echo '<script>
            alert("ACESSO PERMITIDO!!!");
        </script>';
    }else{
        echo '<script>
            alert("ACESSO NEGADO!!!");
        </script>';
        echo "<script>
            document.location.href='index.php' 
        </script>";
    }
    */

?>