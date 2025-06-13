<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validaciones 1</title>
    <link rel="stylesheet" href="style/estilo.css">
    <script defer src="js/form-handler-basic.js"></script>
</head>
<body>

<div class="container">
    <h2>Validación Formulario 1</h2>
    <div id="response"></div>

    <form id="contactForm" method="post" action="validate1.php">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">

        <label for="email">Correo electrónico:</label>
        <input type="text" id="email" name="email">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" placeholder="123-456-7890">

        <input type="submit" value="Enviar">
    </form>
</div>

</body>
</html>
