<?php
// Ruta para la conexion.php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $rol = $_POST["rol"];

    // Verificar si el usuario ya está registrado
    $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El usuario ya está registrado, actualizar su rol
        $sql = "UPDATE usuarios SET rol = '$rol' WHERE nombre = '$nombre'";
        if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario a otra página según su rol
        if ($rol === 'administrador') {
            header("Location: ../Frontend/pagina_administrador.php");
        } else {
            header("Location: ../Frontend/pagina_usuario_estandar.php");
        }
        exit; // Salir del script después de redirigir al usuario
    } else {
        echo "Error al actualizar el rol: " . $conn->error;
    }   
    } else {
        // El usuario no está registrado, crear un nuevo registro
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, rol) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $rol);

        if ($stmt->execute()) {
            // Redirigir al usuario a otra página según su rol
            if ($rol === 'administrador') {
                header("Location: ../Frontend/pagina_administrador.php");
            } else {
                header("Location: ../Frontend/pagina_usuario_estandar.php");
            }
            exit; // Salir del script después de redirigir al usuario
        } else {
            echo "Error al registrar el usuario: " . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>
