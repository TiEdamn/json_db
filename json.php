<?php
// Многомерный ассоциативный массив
$A["Ivanov"]["name"]="Иванов И.И.";
$A["Ivanov"]["age"]="25";
$A["Ivanov"]["email"]="ivanov@mail.ru";

$A["Petrov"]["name"]="Петров П.П.";
$A["Petrov"]["age"]="34";
$A["Petrov"]["email"]="petrov@mail.ru";

$A["Sidorov"]["name"]="Сидоров С.С.";
$A["Sidorov"]["age"]="47";
$A["Sidorov"]["email"]="sidorov@mail.ru";

var_dump(json_encode($A));

?>