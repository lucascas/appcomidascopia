<?php
require 'database_connection.php';

$data = json_decode(file_get_contents('php://input'), true);

$comidaId = $data['comidaId'];
$categories = $data['categories'];

// Convierte el array de categorías a una cadena separada por comas
$categoriesString = implode(', ', $categories);

$query = $db->prepare("UPDATE comidas SET categoria = ? WHERE id = ?");
$query->execute([$categoriesString, $comidaId]);

$response = [
    'message' => 'Categoría actualizada con éxito.'
];

echo json_encode($response);
?>
