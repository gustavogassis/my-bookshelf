<?php

function validationFails(array $validation) {
    foreach($validation as $validator) {
        if ($validator["valid"] === false) {
            return true;
        }
    }
    return false;
}

function validationErrors(array $validation) {
    $errors = array_filter($validation, function ($item) {
        return $item["valid"] === false;
    });

    $errors = array_map(function ($item) {
        return $item["message"];
    }, $errors);

    return $errors;
}

function validationData() {
    $errors = isset($_COOKIE["errors"]) ? unserialize($_COOKIE["errors"]) : [];

    setcookie("errors", "", time() - 3600);

    return $errors;
}

function notEmpty($value, $fieldName) {
    $output = ["valid" => true, "message" => ""];

    if (empty($value)) {
        $output = [
            "valid"   => false,
            "message" => "É obrigatório o preenchimento do campo <b>$fieldName</b>."
        ];
    }

    return $output;
}

function isEmail($value, $fieldName) {
    $output = ["valid" => true, "message" => ""];

    if (!notEmpty($value, $fieldName)["valid"]) {
        return $output;
    }

    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $output = [
            "valid"   => false,
            "message" => "Preencha o campo <b>$fieldName</b> com um email válido."
        ];
    }

    return $output;
}

function maxSize($value, $limit, $fieldName) {
    $output = ["valid" => true, "message" => ""];

    if (is_array($value)) {
        $value = implode($value);
    }

    if (!(strlen($value) <= $limit)) {
        $output = [
            "valid"   => false,
            "message" => "O campo <b>$fieldName</b> deve ser menor que $limit caracteres."
        ];
        return $output;
    }

    return $output;
}

function redirectError($errors, $input, $location) {
    setcookie("errors", serialize($errors));
    setcookie("email", serialize($input));
    header("Location: $location");
}

?>