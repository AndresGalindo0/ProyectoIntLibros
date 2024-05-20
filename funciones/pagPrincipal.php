<?php
    session_start();
    $nombre = isset($_SESSION['nombreUser']) ? $_SESSION['nombreUser'] : "Usuario";
    
    require_once("conecta.php");
    $con = conecta();

    $query = "SELECT libros.titulo, libros.usuario_id, usuarios.nombre, libros.archivo_f, libros.edicion, libros.resena, libros.status FROM libros JOIN usuarios ON libros.usuario_id = usuarios.id WHERE usuarios.status = 1";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "Error al consultar la base de datos: " . mysqli_error($con);
        exit;
    }

    $libros = [];

    while ($fila = mysqli_fetch_assoc($result)) {
        $libros[] = $fila;
    }

    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        .container {
            color: #000099;
            padding: 20px;
            position: relative;
            font-family: 'Impact', sans-serif;
        }

        .search-container {
            text-align: right;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .welcome {
            margin-bottom: 20px;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 0;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .back-button:hover {
            color: #fff;
            background-color: #000099;
            border-color: #155724;
        }

        .back-button.logout-button {
            position: static;
        }

        input[type="text"] {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        button[type="submit"] {
            color: #fff;
            background-color: #000099;
            border-color: #007bff;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        button[type="submit"]:hover {
            color: #fff;
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .slick-slider {
            width: 100%;
        }

        .slick-slide {
            margin: 0 10px;
        }

        .slick-slide img {
            width: 200px;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: block;
            margin: 0 auto;

        }

        .slick-slide .book-title {
            padding: 10px;
            margin: 0;
            font-size: 16px;
            color: #333;
            text-align: center;
            border-radius: 0 0 5px 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: , sans-serif;
            background-image: linear-gradient(rgba(255,255,255,0.3), rgba(255,255,255,0.3)), url('imagen13.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 id="dynamic-heading" style="color: #000099;">Hola</h1>
        <div class="welcome">Bienvenido <?php echo $nombre;?></div>
        <a href="perfil.php" class="back-button">Perfil de usuario</a>
        <a href="cerrar_sesion.php" class="back-button logout-button">Cerrar sesión</a>
        <div class="search-container">
            <form action="buscar.php" method="get">
                <input type="text" name="titulo" placeholder="Buscar libros por título..." required>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <h2>Recomendaciones para ti</h2>
        <div class="slider">
            <?php foreach ($libros as $libro): ?>
                <div class="book">
                    <img src="../libros/<?php echo $libro['archivo_f']; ?>" alt="<?php echo $libro['titulo']; ?>">
                    <p class="book-title"><?php echo $libro['titulo']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                const heading = document.getElementById('dynamic-heading');
                heading.textContent = 'Intercambio de libros';
                heading.style.fontFamily = 'Impact';
            }, 3000);
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 600,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>

