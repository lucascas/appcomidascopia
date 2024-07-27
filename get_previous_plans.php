<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

/* Conexión local */
$host = "localhost";
$username = "root";
$password = "";
$dbname = "meal_planner";


/* Conexión servidor 


$servername = "sql105.infinityfree.com";
$username = "if0_36943803";
$password = "9HiF8jHuRJqHZsj";
$dbname = "if0_36943803_comidassemanales";
*/

$sql = "SELECT *, fecha_creacion FROM weekly_plans ORDER BY id DESC LIMIT 5";

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Consulta SQL para obtener los planes anteriores
$sql = "SELECT * FROM weekly_plans ORDER BY id DESC LIMIT 50"; // Obtiene los últimos 5 planes

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $plans = [];
    while($row = $result->fetch_assoc()) {
        $plans[] = $row;
    }
    echo json_encode($plans);
} else {
    echo json_encode([]);
}

$conn->close();
?>