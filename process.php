<?php
require_once("FormValidator.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $validator = new FormValidator($_POST, true); // true = validar captcha
    $validator->setRequiredFields(['name', 'email', 'telefono', 'captcha']);
    try {
    $validator->validate();
        
        // Capturamos el nombre limpio para mostrarlo
        $name = htmlspecialchars(trim($_POST['name']));
        
        echo "<div style='color:green;'>Formulario válido. ¡Gracias, $name!</div>";
    } catch (Exception $e) {
        echo "<div style='color:red;'>" . $e->getMessage() . "</div>";
    }
}
?>
