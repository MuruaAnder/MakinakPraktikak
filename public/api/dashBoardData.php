<?php
header('Content-Type: application/json');



try {
    // Crear conexión
    $config = require 'db_config.php';

    // Usar los datos para crear la conexión
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

    // Verificar conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }

    // Escribir la consulta SQL
    $sql = "SELECT * FROM maquina;";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Guardar resultados en un array
    $registros = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $registros[] = $row;
        }
    }

    // Devolver resultados como JSON
    echo json_encode($registros);
} catch (Exception $e) {
    echo json_encode(['error' => true, 'message' => $e->getMessage()]);
} finally {
    // Cerrar la conexión
    $conn->close();
}
?>