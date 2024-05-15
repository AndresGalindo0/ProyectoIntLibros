<?php
require_once("conecta.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            position: relative;
        }
        .container {
            width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-size: 24px;
        }
        .profile-info {
            padding: 20px;
        }
        .profile-info div {
            margin-bottom: 10px;
        }
        .profile-info div label {
            font-weight: bold;
            color: #333;
        }
        .profile-info div span {
            color: #666;
        }
        .back-button {
            position: absolute;
            top: 5px;
            right: 10px;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .profile-picture img {
            width: 150px;
            height: auto;
            display: block;
            margin: 0 auto; 
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<?php

if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];

    $con = conecta();

    $sql = "SELECT * FROM usuarios WHERE id = $usuario_id";
    $res = $con->query($sql);

    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $nombre = $row["nombre"];
        $codigo = $row["codigo"];
        $carrera = $row["carrera"];
        $correo = $row["correo"];
        $fecha_in = $row["fecha_in"];
        $archivo = $row["archivo_n"];
        $archivoc = $row["archivo_x"];

        // Aquí comienza la parte de HTML para mostrar el perfil del usuario
        echo "<div class='container'>";
        echo "<div class='header'>Perfil de Usuario</div>";
        echo "<div class='profile-info'>";
        echo "<div class='profile-picture'><img src='../archivos/$archivo' alt='Imagen de perfil'></div>";
        echo "<div class='profile-picture'><img src='../archivos/$archivoc' alt='Credencial estudiante'></div>";
        echo "<div><label>Código de la UDG:</label> <span>$codigo</span></div>";
        echo "<div><label>Nombre completo:</label> <span>$nombre</span></div>";
        echo "<div><label>Carrera:</label> <span>$carrera</span></div>";
        echo "<div><label>Correo:</label> <span>$correo</span></div>";
        echo "<div><label>Fecha de ingreso:</label> <span>$fecha_in</span></div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<div class='header'>Perfil de Usuario</div>";
        echo "<div class='profile-info' style='text-align: center; padding: 20px;'>";
        echo "No se encontraron registros para el usuario.";
        echo "</div>";
        echo "</div>";
    }

    $con->close();
} else {
    echo "<div class='container'>";
    echo "<div class='header'>Perfil de Usuario</div>";
    echo "<div class='profile-info' style='text-align: center; padding: 20px;'>";
    echo "No se proporcionó ningún ID de usuario.";
    echo "</div>";
    echo "</div>";
}
?>

<a href="pagPrincipal.php" class="back-button">Regresar a la pagina principal</a>

<br>

    <button onclick="mostrarAlerta()" class="btn btn-primary">Pedir</button>

    <script>
        function mostrarAlerta() {
            Swal.fire({
                title: '¿Estás seguro de pedir este libro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'question',
                confirmButtonText: 'Entendido'
            });
        }
    </script>

</body>
</html>