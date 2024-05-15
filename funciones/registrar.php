<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('imagen2.jpeg'); /* Reemplaza 'ruta_de_la_imagen.jpg' con la ruta de tu imagen */
            background-size: cover; /* Para asegurarse de que la imagen de fondo cubra todo el cuerpo */
            background-repeat: no-repeat; /* Evita la repetición de la imagen de fondo */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.7); /* Cambia la opacidad del fondo */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #2133f3;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .Iniciar-Sesion {
            position: absolute; 
            top: 10px; 
            left: 10px;
            padding: 10px;
        }

        .Iniciar-Sesion button {
            border: none;
            border-radius: 4px;
            background-color: #2133f3;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            padding: 10px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container">
        <h2 style="text-align: center;">Registro para nuevos usuarios</h2>
        <form method="post" action="usuarios_salva.php" enctype="multipart/form-data">
            <input type="text" name="codigo" placeholder="Código de UDG" required><br>
            <input type="text" name="nombre" placeholder="Nombre de usuario" required><br>
            <input type="password" name="pass" placeholder="Contraseña" required><br>
            <input type="text" name="carrera" placeholder="Carrera" required><br>
            <input type="email" name="correo" placeholder="Correo electrónico" pattern=".+@alumnos.udg.mx" value="@alumnos.udg.mx" title="Por favor, introduce una dirección de correo electrónico institucional." required><br>
            <input type="text" name="fecha_in" placeholder="Fecha de ingreso"><br>

            <h7>Agrega tu foto de perfil:</h7>
            <input type="file" id="archivo_fotoP" name="archivo_fotoP"><br><br>
            <h7>Agrega una foto de tu credencial UDG:</h7>
            <input type="file" id="archivo_fotoC" name="archivo_fotoC"><br><br>

            //////SWEET ALERT
            <input type="submit" value="Guardar" />
        </form>
    </div>
</body>
</html>