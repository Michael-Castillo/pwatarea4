<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página del Administrador</title>
    <link rel="stylesheet" type="text/css" href="../frontend/Estilos/administrador.css">
</head>
<body>
    <h1>Bienvenido Administrador</h1>
    <h2>Gestión de Tareas</h2>

    <?php
    // Incluir el archivo de gestión de tareas
    include '../Backend/gestion_tareas_admin.php';
    ?>

    <h3>Agregar Nueva Tarea</h3>
    <form method="post">
        <input type="text" name="descripcion" placeholder="Descripción de la tarea" required>
        <input type="hidden" name="id_usuario" value="1">
        <input type="submit" name="nueva_tarea" value="Agregar Tarea">
    </form>

    <h3>Eliminar Tarea</h3>
    <form method="post">
        <input type="number" name="id_tarea" placeholder="ID de la tarea a eliminar" required>
        <input type="submit" name="eliminar_tarea" value="Eliminar Tarea">
    </form>

    <h3>Marcar Tarea</h3>
    <form method="post">
        <input type="number" name="id_tarea" placeholder="ID de la tarea" required>
        <select name="completada" required>
            <option value="0">Pendiente</option>
            <option value="1">Completada</option>
        </select>
        <input type="submit" name="marcar_completada" value="Actualizar Estado">
    </form>
</body>
</html>