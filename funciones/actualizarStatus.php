<?php
session_start();
if(!isset($_SESSION['idUser'])) {
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['titulo']) && isset($_POST['nuevo_status'])) {
    require "conecta.php";
    $con = conecta();
    $titulo = $_POST['titulo'];
    $nuevo_status = $_POST['nuevo_status'];
    $sql = "UPDATE libros SET status = ? WHERE titulo = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("is", $nuevo_status, $titulo);
    $stmt->execute();
    $stmt->close();
    $con->close();
    header("Location: misLibros.php");
    exit();
} else {
    echo "error";
    exit();
}
?>
