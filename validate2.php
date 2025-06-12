<?php
include_once("ClaseValidacion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $validator = new FormValidator($_POST);
    $validator->setRequiredFields(['name', 'email', 'telefono']);
    
    try {
        $validator->validate();
        $name = htmlspecialchars($_POST['name']);
        echo "<div style='color:green;'>Formulario válido. ¡Gracias, $name!</div>";
    } catch (Exception $e) {
        echo "<div style='color:red;'>" . $e->getMessage() . "</div>";
    }
}
?>
