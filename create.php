<?php
    $msg = $_POST["arr"];
    $file = 'site.json';
    
    // Открываем файл для получения существующего содержимого
    //$current = file_get_contents($file);
    
    // Добавляем нового человека в файл
    $current = json_encode($msg);
    
    // Пишем содержимое обратно в файл
    file_put_contents($file, $current);
    
    return print_r($_POST);
?>