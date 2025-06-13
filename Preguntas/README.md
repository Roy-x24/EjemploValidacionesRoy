¿Qué validaciones se aplican?
En PHP:
   Que los campos obligatorios no estén vacíos.
   Que el email tenga un formato válido.

¿Qué pasa si no se valida bien?
   El servidor devuelve un error.
   Ese error se puede mostrar en la página dentro del <div id="response">.

¿Qué hace fetch()?
   Envía el formulario al servidor sin recargar la página.

¿Cómo se muestra la respuesta?
   La respuesta del servidor se pone dentro del elemento con id response usando innerHTML.