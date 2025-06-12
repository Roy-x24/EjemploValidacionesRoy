<?php
function clean($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$name = clean(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$email = clean(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
$telefono = clean(filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING));

$errors = [];

// Validar nombre
if ($name === '') {
    $errors[] = "El nombre es obligatorio.";
} elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $errors[] = "El nombre solo puede contener letras y espacios.";
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Formato de correo inválido.";
}

// Validar teléfono
if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $telefono)) {
    $errors[] = "Teléfono inválido. Debe tener el formato 123-456-7890.";
}

if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul>";
} else {
    echo "<div style='color:green;'>Formulario enviado correctamente. ¡Gracias, $name!</div>";
}
?>
