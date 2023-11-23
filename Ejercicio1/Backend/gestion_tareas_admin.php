<?php
    // Ruta para la conexion.php
    require_once 'conexion.php';

    // Agregar una nueva tarea
    if (isset($_POST['nueva_tarea'])) {
        $descripcion = $_POST['descripcion'];
        $id_usuario = $_POST['id_usuario']; // Obtención del ID del usuario administrador

        $sql = "INSERT INTO tareas (descripcion, id_usuario) VALUES ('$descripcion', '$id_usuario')";

        if ($conn->query($sql) === TRUE) {
            echo "Nueva tarea agregada con éxito.";
        } else {
            echo "Error al agregar la tarea: " . $conn->error;
        }
    }

    // Eliminar una tarea existente
    if (isset($_POST['eliminar_tarea'])) {
        $id_tarea = $_POST['id_tarea'];

        $sql = "DELETE FROM tareas WHERE id = $id_tarea";

        if ($conn->query($sql) === TRUE) {
            echo "Tarea eliminada con éxito.";
        } else {
            echo "Error al eliminar la tarea: " . $conn->error;
        }
    }

    // Marcar una tarea como completada o pendiente
    if (isset($_POST['marcar_completada'])) {
        $id_tarea = $_POST['id_tarea'];
        $completada = $_POST['completada'];

        $sql = "UPDATE tareas SET completada = $completada WHERE id = $id_tarea";

        if ($conn->query($sql) === TRUE) {
            echo "Estado de la tarea actualizado con éxito.";
        } else {
            echo "Error al actualizar el estado de la tarea: " . $conn->error;
        }
    }

    // Consulta para obtener la lista de tareas con sus IDs y estado
    $sql = "SELECT id, descripcion, completada FROM tareas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Lista de Tareas</h3>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            $estado = $row["completada"] == 1 ? "Completada" : "Pendiente";
            echo "<li>ID: " . $row["id"] . " - Descripción: " . $row["descripcion"] . " - Estado: " . $estado . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron tareas.";
    }

    $conn->close();
    ?>
    