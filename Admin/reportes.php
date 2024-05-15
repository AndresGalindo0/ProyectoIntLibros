<?php
session_start();
if(isset($_SESSION['idUser'])) {
    $perfil_id = $_SESSION['idUser'];
} else {
    // Si el usuario no está autenticado, redirigirlo a la página de inicio de sesión o mostrar un mensaje de error
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Comentarios</title>
</head>
<body>
  <h2>Especifica tu reporte: </h2>
  <form id="formularioComentario" action="usuarios_sanciones.php" method="post">
    <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br>
    <!-- Campo oculto para almacenar el ID del perfil reportado -->
    <input type="hidden" name="perfil_id" value="<?php echo $_SESSION['idUser']; ?>">
    <input type="submit"  value="Enviar reporte" class="button">

    
  </form>
</body>
</html>