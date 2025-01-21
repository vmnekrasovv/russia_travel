<?php

require_once "db.php";
require_once "sendQuery.php";

// Получаем список всех директорий в папке images/src/gallery
$directories = glob('images/src/gallery/*', GLOB_ONLYDIR);

// Проверяем названия всех директорий
foreach ($directories as $dir) {
    echo "Directory: " . basename($dir) . "\n";
}

// Создаем новую директорию с названием N+1
$newDirectoryName = count($directories) + 1;
mkdir('images/src/gallery/' . $newDirectoryName);

// Получаем список файлов в директории images/src/gallery/N/
//$files = glob('images/src/gallery/' . $newDirectoryName . '/*');

// Переименовываем файлы в новой директории перед сохранением
// $newFileName = count($files) + 1;
$newFileName = 1;
rename($file, 'images/src/gallery/' . $newDirectoryName . '/' . $newFileName);

// Сохраняем файл в новой директории
move_uploaded_file($_FILES["file"]["tmp_name"], 'images/src/gallery/' . $newDirectoryName . '/' . $_FILES["file"]["name"]);

?>