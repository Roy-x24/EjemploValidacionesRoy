const form = document.getElementById('contactForm');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const responseDiv = document.getElementById('response');
  responseDiv.innerHTML = "";

  const name = form.name.value.trim();
  const email = form.email.value.trim();
  const telefono = form.telefono.value.trim();

  const errors = [];

  const nameRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/;
  if (name === "") {
    errors.push("El nombre es obligatorio.");
  } else if (!nameRegex.test(name)) {
    errors.push("El nombre solo puede contener letras y espacios.");
  }

  if (email === "") {
    errors.push("El correo electrónico es obligatorio.");
  } else if (!email.includes('@')) {
    errors.push("Email inválido, falta el '@'.");
  } else if (!email.endsWith('.com')) {
    errors.push("El correo debe terminar en .com.");
  }

  const telRegex = /^\d{3}-\d{3}-\d{4}$/;
  if (!telRegex.test(telefono)) {
    errors.push("Teléfono inválido. Debe tener el formato 123-456-7890.");
  }

  if (errors.length > 0) {
    responseDiv.innerHTML = errors.map(e => `<p style="color:red;">${e}</p>`).join('');
    return;
  }

  const formData = new FormData(form);

  fetch(form.action, {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    responseDiv.innerHTML = data;
  })
  .catch(error => {
    responseDiv.innerHTML = "<p>Hubo un error al enviar el formulario.</p>";
  });
});
