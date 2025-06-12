<!DOCTYPE html>
<html>
<head>
    <title>Validaciones</title>
    <script defer src="form-handler.js"></script>
</head>
<body>

<h2>Ejemplo de Validaciones</h2>

<div id="errors" style="color:red;"></div>
<div id="response" style="margin-top:10px;"></div>

<form id="contactForm" method="post" action="validate.php">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Teléfono: <input type="text" name="telefono" placeholder="123-456-7890"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
