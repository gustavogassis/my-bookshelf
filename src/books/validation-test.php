<?php

require_once "validation.php";

echo "Teste com o campo nn vazio";
["valid" => $valid1, "message" => $message1] = notEmpty("Gustavo", "nome");
var_dump($valid1 === true, $message1 === "");

echo "Teste com o campo vazio";
["valid" => $valid2, "message" => $message2] = notEmpty("", "nome");
var_dump($valid2 === false, $message2 === "É obrigatório o preenchimento do campo <b>nome</b>.");

echo "Teste com o campo menor que o limite";
["valid" => $valid3, "message" => $message3] = lessThan(50, 60, "paginas");
var_dump($valid3 === true, $message3 === "");

echo "Teste com o campo menor que o limite em string";
["valid" => $valid4, "message" => $message4] = lessThan("50", 60, "paginas");
var_dump($valid4 === true, $message4 === "");

echo "Teste com o campo com string nn numerica";
["valid" => $valid5, "message" => $message5] = lessThan("bola", 60, "paginas");
var_dump($valid5 === false, $message5 === "O campo <b>paginas</b> deve ser numérico.");

echo "Teste com o campo maior que o limite";
["valid" => $valid6, "message" => $message6] = lessThan(70, 60, "paginas");
var_dump($valid6 === false, $message6 === "O campo <b>paginas</b> deve ser menor que 60.");

echo "Teste com o campo numérico em string";
["valid" => $valid7, "message" => $message7] = isNumeric("70", "idade");
var_dump($valid7 === true, $message7 === "");

echo "Teste com o campo não numérico em string";
["valid" => $valid8, "message" => $message8] = isNumeric("bola", "idade");
var_dump($valid8 === false, $message8 === "O campo <b>idade</b> deve ser numérico.");

echo "Teste com o campo menor que o limite de caracteres";
["valid" => $valid9, "message" => $message9] = maxSize("teste", 9,"nome");
var_dump($valid9 === true, $message9 === "");

echo "Teste com o campo maior que o limite de caracteres";
["valid" => $valid10, "message" => $message10] = maxSize("testetesteteste", 10,"nome");
var_dump($valid10 === false, $message10 === "O campo <b>nome</b> deve ser menor que 10 caracteres.");