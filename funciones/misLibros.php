<?php
session_start();

if(!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit();
}

require "conecta.php";
$con = conecta();

$idUser = $_SESSION['idUser'];
$sql = "SELECT libros.*, usuarios.nombre AS nombre FROM libros JOIN usuarios ON libros.usuario_id = usuarios.id WHERE usuario_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $idUser);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Libros</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>


</head>
<body>
    <h1>Mis Libros</h1>
    <p>Libros de: <?php echo $_SESSION['nombreUser']; ?></p>
    <table>
        <tr>
            <th>Título</th>
            <th>Edición</th>
            <th>Reseña</th>
            <th>Status</th>
            <th>Propietario</th>
            <th>Foto</th>
            <th>Actualizar Status</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['edicion']; ?></td>
                <td><?php echo $row['resena']; ?></td>
                <td><?php echo $row['status'] == 1 ? "Disponible" : "Prestado"; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><img src="../libros/<?php echo $row['archivo_f']; ?>" alt="Foto del libro" style="max-width: 100px;"></td>
                <td>
                    <form method="post" action="actualizarStatus.php">
                        <input type="hidden" name="titulo" value="<?php echo $row['titulo']; ?>">
                        <select name="nuevo_status">
                            <option value="1">Disponible</option>
                            <option value="2">Prestado</option>
                        </select>
                        <button type="submit">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        <a href="pagPrincipal.php" class="back-button">Regresar a la pagina principal</a>
        <br>
        <a href='perfil.php' class='button'>Regresar al perfil</a>
        <br>
        <a href='registroLibros.php'>Registrar Libros</a>
    </table>
    
</body>
</html>

