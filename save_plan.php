<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");


/* Conexión local  */
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
// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Obtener datos del POST
$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO weekly_plans (lunes_almuerzo, lunes_cena, martes_almuerzo, martes_cena, miercoles_almuerzo, miercoles_cena, jueves_almuerzo, jueves_cena, viernes_almuerzo, viernes_cena, comprar_super, fecha_creacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssss", 
    $data['lunes_almuerzo'], $data['lunes_cena'],
    $data['martes_almuerzo'], $data['martes_cena'],
    $data['miercoles_almuerzo'], $data['miercoles_cena'],
    $data['jueves_almuerzo'], $data['jueves_cena'],
    $data['viernes_almuerzo'], $data['viernes_cena'],
    $data['comprar_super'], $data['fecha_creacion']
);

if ($stmt->execute()) {
    echo json_encode(["message" => "Plan saved successfully", "id" => $conn->insert_id]);
} else {
    echo json_encode(["error" => "Error saving the plan: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>