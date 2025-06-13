<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validaciones 3</title>
    <link rel="stylesheet" href="style/estilo.css">
    <script defer src="js/form-handler-captcha.js"></script>
</head>
<body>

<div class="container">
    <h2>Validación con Captcha Formulario 3</h2>
    <div id="response"></div>

    <form id="contactForm" method="post" action="process.php">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">

        <label for="email">Correo electrónico:</label>
        <input type="text" id="email" name="email">

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" placeholder="123-456-7890">

        <label for="captcha">¿Cuánto es 3 + 4?</label>
        <input type="text" id="captcha" name="captcha">

        <input type="submit" value="Enviar">
    </form>
</div>

</body>
</html>
