<?php
class FormValidator {
    private $data;
    private $requiredFields = [];
    private $errors = [];
    private $captchaRequired = false;

    public function __construct($postData, $captchaRequired = false) {
        $this->data = $postData;
        $this->captchaRequired = $captchaRequired;
    }

    public function setRequiredFields(array $fields) {
        $this->requiredFields = $fields;
    }

    public function validate() {
        $this->validateRequiredFields();
        $this->validateNameFormat();
        $this->validateEmailFormat();
        $this->validateTelefonoFormat();
        if ($this->captchaRequired) {
            $this->validateCaptcha();
        }

        if (!empty($this->errors)) {
            throw new Exception(implode("<br>", $this->errors));
        }
    }

    private function validateRequiredFields() {
        foreach ($this->requiredFields as $field) {
            if (empty($this->data[$field])) {
                $this->errors[] = ucfirst($field) . " es obligatorio.";
            }
        }
    }

    private function validateNameFormat() {
        if (!empty($this->data['name']) && !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/u", $this->data['name'])) {
            $this->errors[] = "El nombre solo puede contener letras y espacios.";
        }
    }

    private function validateEmailFormat() {
        if (!empty($this->data['email']) && !filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Formato de correo inválido.";
        }
    }

    private function validateTelefonoFormat() {
        if (!empty($this->data['telefono']) && !preg_match('/^\d{3}-\d{3}-\d{4}$/', $this->data['telefono'])) {
            $this->errors[] = "Teléfono inválido. Debe tener el formato 123-456-7890.";
        }
    }

    private function validateCaptcha() {
        if (empty($this->data['captcha']) || trim($this->data['captcha']) !== '7') {
            $this->errors[] = "CAPTCHA incorrecto.";
        }
    }
}
?>
