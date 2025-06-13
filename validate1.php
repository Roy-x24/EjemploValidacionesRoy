<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nameErr = $emailErr = $telefonoErr = "";

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $telefono = test_input($_POST["telefono"]);

    // Validar nombre
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Solo se permiten letras y espacios en el nombre.";
    }

    // Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Formato de correo inválido.";
} elseif (substr($email, -4) !== '.com') {
    $emailErr = "El correo debe terminar en .com.";
}


    // Validar teléfono (formato: 123-456-7890)
    if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $telefono)) {
        $telefonoErr = "Teléfono inválido. Debe ser 123-456-7890.";
    }

    // Mostrar errores si existen
    if ($nameErr || $emailErr || $telefonoErr) {
        echo "<b>Errores:</b><br>";
        if ($nameErr) echo "$nameErr<br>";
        if ($emailErr) echo "$emailErr<br>";
        if ($telefonoErr) echo "$telefonoErr<br>";
    } else {
        echo "<div style='color:green;'>Formulario enviado correctamente. ¡Gracias, " . htmlspecialchars($name) . "!</div>";
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
