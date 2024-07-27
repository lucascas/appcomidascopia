<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$username = "root";
$password = "";
$dbname = "meal_planner";

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Consulta SQL para obtener las comidas de weekly_plans
$sql = "SELECT 
            lunes_almuerzo, lunes_cena,
            martes_almuerzo, martes_cena,
            miercoles_almuerzo, miercoles_cena,
            jueves_almuerzo, jueves_cena,
            viernes_almuerzo, viernes_cena,
            fecha_creacion
        FROM weekly_plans 
        ORDER BY fecha_creacion DESC 
        LIMIT 10"; // Limitamos a los últimos 10 planes para no sobrecargar

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $comidas = [];
    while($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            if ($key != 'fecha_creacion' && !empty($value)) {
                $comidas[] = [
                    'nombre' => $value,
                    'categoria' => ucfirst(explode('_', $key)[0]), // Día de la semana
                    'descripcion' => ucfirst(explode('_', $key)[1]) // Almuerzo o Cena
                ];
            }
        }
    }
    $comidas = array_unique($comidas, SORT_REGULAR); // Eliminar duplicados
    echo json_encode(array_values($comidas)); // Reindexar el array
} else {
    echo json_encode([]);
}

$conn->close();
?>