<?php

function validationFails(array $validation) {
    foreach($validation as $validator) {
        if ($validator['valid'] === false) {
            return true;
        }
    }
    return false;
}

function validationErrors(array $validation) {
    $errors = array_filter($validation, function ($item) {
        return $item['valid'] === false;
    });

    $errors = array_map(function ($item) {
        return $item['message'];
    }, $errors);

    return $errors;
}

function validationData() {
    $errors = isset($_COOKIE["errors"]) ? unserialize($_COOKIE["errors"]) : [];
    $book = isset($_COOKIE["book"]) ? unserialize($_COOKIE["book"]) : [];

    setcookie("errors", "", time() - 3600);
    setcookie("book", "", time() - 3600);

    return [$book, $errors];
}

function notEmpty($value, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if (empty($value)) {
        $output = [
            'valid'   => false,
            'message' => "É obrigatório o preenchimento do campo <b>$fieldName</b>."
        ];
    }

    return $output;
}

function lessThan($value, $limit, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if (!(intval($value) <= $limit)) {
        $output = [
            'valid'   => false,
            'message' => "O campo <b>$fieldName</b> deve ser menor que $limit."
        ];
        return $output;
    }

    return $output;
}

function isNumeric($value, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if (!notEmpty($value, $fieldName)['valid']) {
        return $output;
    }
    elseif (!is_numeric($value)) {
        $output = [
            'valid'   => false,
            'message' => "O campo <b>$fieldName</b> deve ser numérico."
        ];
        return $output;
    }

    return $output;
}

function maxSize($value, $limit, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if (is_array($value)) {
        $value = implode($value);
    }

    if (!(strlen($value) <= $limit)) {
        $output = [
            'valid'   => false,
            'message' => "O campo <b>$fieldName</b> deve ser menor que $limit caracteres."
        ];
        return $output;
    }

    return $output;
}

function inList( $list, $value, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if (!notEmpty($value, $fieldName)['valid']) {
        return $output;
    }

    foreach($value as $item) {
        if (!in_array($item, $list)) {
            $output = [
                'valid'   => false,
                'message' => "O campo <b>$fieldName</b> deve ser preenchi com um valor válido."
            ];
            return $output;
        }
    }

    return $output;

}

function notEmptyFile($value, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if ($value['error'] === 4) {
        $output = [
            'valid'   => false,
            'message' => "É obrigatório o preenchimento do campo <b>$fieldName</b>."
        ];
        return $output;
    }

    return $output;
}

function maxSizeFile($value, $limit, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if (!notEmptyFile($value, $fieldName)['valid']) {
        return $output;
    }

    if ($value['size'] > $limit) {
        $txtLimit = ($limit / 1000000) . "MB";
        $output = [
            'valid'   => false,
            'message' => "O arquivo enviado no campo capa <b>$fieldName</b> excede o tamanho máximo de $txtLimit"
        ];
        return $output;
    }

    return $output;

}

function validExtension($value, $fieldName) {
    $output = ['valid' => true, 'message' => ''];

    if (!notEmptyFile($value, $fieldName)['valid']) {
        return $output;
    }

    $filename = $value['name'];
    [$name, $extension] = explode('.', $filename);
    $permittedExtensions = ['jpg', 'jpeg', 'png'];


    if (! in_array($extension, $permittedExtensions)) {
        $output = [
            'valid'   => false,
            'message' => "O arquivo do campo <b>$fieldName</b> não possui uma extensão válida;"
        ];
        return $output;
    }

    return $output;
}

function redirect($page, $message) {
    setcookie('message', serialize($message));
    header("Location: $page");
}

function redirectError($errors, $input, $location) {
    setcookie('errors', serialize($errors));
    setcookie('book', serialize($input));
    header("Location: $location");
}

function redirectView($input, $location) {
    setcookie('data', serialize($input));
    header("Location: $location");
}
?>