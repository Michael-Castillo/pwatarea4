<!DOCTYPE html>
<html>
<head>
    <title>Página del Administrador</title>
    <link rel="stylesheet" type="text/css" href="Estilos/usuarios.css">
</head>
<body>
    <h1>Bienvenido Usuario</h1>
    <h2>Gestión de Tareas</h2>

    <?php
    // Incluir el archivo de gestión de tareas
    include '../Backend/gestion_tareas_usu.php';
    ?>

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
