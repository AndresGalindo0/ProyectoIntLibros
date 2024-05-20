<?php
session_start();
require_once("../funciones/conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_reporte'], $_POST['nuevo_estado'])) {
        $id_reporte = $_POST['id_reporte'];
        $nuevo_estado = $_POST['nuevo_estado'];

        $con = conecta();
        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);
        }

        $sql = "UPDATE reportes SET estado = ? WHERE idr = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("si", $nuevo_estado, $id_reporte);
        if ($stmt->execute()) {
            $sql_perfil = "SELECT perfil_id FROM reportes WHERE idr = ?";
            $stmt_perfil = $con->prepare($sql_perfil);
            $stmt_perfil->bind_param("i", $id_reporte);
            $stmt_perfil->execute();
            $stmt_perfil->bind_result($perfil_id);
            $stmt_perfil->fetch();
            $stmt_perfil->close();

            header("Location: strikes.php?perfil_id=$perfil_id");
            exit;
        } else {
            echo "Error al actualizar el estado del reporte.";
        }

        $stmt->close();
        $con->close();
    } else {
        echo "Falta información necesaria para actualizar el estado del reporte.";
    }
} else {
    header("Location: reportes_activos.php");
    exit;
}
?>
