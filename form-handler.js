const form = document.getElementById('contactForm');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const responseDiv = document.getElementById('response');
  responseDiv.innerHTML = "";

  const name = form.name.value.trim();
  const email = form.email.value.trim();
  const telefono = form.telefono.value.trim();

  const errors = [];

  if (name === "") {
    errors.push("El nombre es obligatorio.");
  }

  if (email === "" || !email.includes('@')) {
    errors.push("Email inválido.");
  }

  const telRegex = /^\d{3}-\d{3}-\d{4}$/;
  if (!telRegex.test(telefono)) {
    errors.push("Teléfono inválido. Debe tener el formato 123-456-7890.");
  }

  if (errors.length > 0) {
    responseDiv.innerHTML = errors.map(e => `<p>${e}</p>`).join('');
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
    console.error('Error:', error);
  });
});
