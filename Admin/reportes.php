<?php
session_start();
if(isset($_SESSION['idUser'])) {
    $perfil_id = $_SESSION['idUser'];
} else {
    header("Location: ../index.php");
    exit();
}
$otroUsuarioID = isset($_GET['id']) ? $_GET['id'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Comentarios</title>
  <style>
    body {
      display: flex;
      justify-content: space-between;
      background-image: linear-gradient(rgba(255,255,255,0.0), rgba(255,255,255,0.0)), url('imagen11.jpg');
      background-size: 400px;
      background-repeat: no-repeat;
      color: #333;
      font-family: Arial, sans-serif;
      background-color: white;
      margin: 0;
      padding: 0;
    }

    #formularioContainer {
      width: 50%;
      margin: auto;
      padding: 20px;
    }

    h2 {
      color: #333;
    }

    #formularioComentario {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #comentario {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 5px;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div id="formularioContainer">
    <h2>Especifica tu reporte:</h2>
    <form id="formularioComentario" action="usuarios_sanciones.php" method="post">
      <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br>
      <input type="hidden" name="otroUsuarioID" value="<?php echo htmlspecialchars($otroUsuarioID); ?>">
      <input type="submit"  value="Enviar reporte" class="button">
    </form>
  </div>
</body>
</html>
