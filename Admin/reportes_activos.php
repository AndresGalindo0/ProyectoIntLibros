<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes Pendientes</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>

<?php
    session_start();

    require_once("../funciones/conecta.php");

    $script = "";

    function obtenerReportesPendientes() {
        global $script;
        $con = conecta();

        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);
        }

        $sql = "SELECT * FROM reportes WHERE estado = 'pendiente'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Reportes Pendientes</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID Reporte</th><th>Contenido</th><th>Usuario Reportado</th><th>Actualizar Estado</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idr"] . "</td>";
                echo "<td>" . $row["contenido"] . "</td>";
                echo "<td>" . obtenerNombreUsuario($row["perfil_id"]) . "</td>";
                echo "<td>";
                echo "<form method='post' action='actualizar_estado.php'>";
                echo "<input type='hidden' name='id_reporte' value='" . $row['idr'] . "'>";
                echo "<select name='nuevo_estado'>";
                echo "<option value='pendiente'>Pendiente</option>";
                echo "<option value='aceptado'>Aceptado</option>";
                echo "<option value='rechazado'>Rechazado</option>";
                echo "</select>";
                echo "<button type='submit'>Actualizar</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            $script = "<script>alert('No hay reportes pendientes.'); window.location.href = 'usuarios_lista.php';</script>";
        }

        $con->close();
    }

    function obtenerNombreUsuario($perfil_id) {
        $con = conecta();

        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);
        }

        $sql = "SELECT nombre FROM usuarios WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $perfil_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $nombre = "";
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row["nombre"];
        }

        $stmt->close();
        $con->close();

        return $nombre;
    }

    obtenerReportesPendientes();
?>
<?php echo $script; ?>

</body>
</html>
