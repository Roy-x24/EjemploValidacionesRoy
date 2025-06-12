<?php
// https://mailtrap.io/blog/php-form-validation/#How-to-validate-a-form-in-PHP-using-script
class FormValidator {
    private $data;
    private $requiredFields = [];
    private $errors = [];

    public function __construct($postData) {
        $this->data = $postData;
    }

    public function setRequiredFields(array $fields) {
        $this->requiredFields = $fields;
    }

    public function validate() {
        $this->validateRequiredFields();
        $this->validateEmailFormat();
        $this->validateTelefonoFormat();

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
}
?>
