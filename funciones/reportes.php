<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Comentarios</title>
</head>
<body>
  <h2>Especifica tu reporte: </h2>
  <form id="formularioComentario" action="../Admin/usuarios_sanciones.php" method="post">
    <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Enviar reporte" class="button">
  </form>
</body>
</html>
