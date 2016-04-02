<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="" method="POST">

    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
    <br/>
    <!-- Rotation-->
    <input type="text" name="rotate" placeholder="rotation"/>
    <br/>

    <!-- Size width-->
    <input type="text" name="width" placeholder="width"/>
    <br/>
    <!-- Size height-->
    <input type="text" name="height" placeholder="height"/>
    <br/>

    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="image" type="file" />
    <br/>
    <input type="submit" value="Upload Image" />
</form>

<?php

$uploaddir = '/images/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";

?>
