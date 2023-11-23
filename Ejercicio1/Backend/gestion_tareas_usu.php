<?php
    // Ruta para la conexion.php
    require_once 'conexion.php';
    
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