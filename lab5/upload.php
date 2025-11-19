<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файла на сервер</title>
</head>
<body>
    <div>
        <?php
        if (isset($_FILES['fupload'])) {
            $file = $_FILES['fupload'];

            echo 'Имя файла: ' . htmlspecialchars($file['name']) . '<br>';
            echo 'Размер: ' . $file['size'] . ' байт<br>';
            echo 'Имя врем. файла: ' . htmlspecialchars($file['tmp_name']) . '<br>';
            echo 'Тип: ' . mime_content_type($file['tmp_name']) . '<br>';
            echo 'Код ошибки: ' . $file['error'] . '<br>';

            if ($file['type'] === 'image/jpeg' && $file['error'] === 0) {
                // Генерируем имя файла по MD5-хешу
                $newFilename = md5($file['name']) . '.jpg';
                $uploadDir = 'upload/';
                $destination = $uploadDir . $newFilename;

                // Перемещаем файл в каталог upload
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    echo 'Файл успешно загружен в каталог ' . $uploadDir . ' под именем ' . $newFilename . '<br>';
                } else {
                    echo 'Ошибка при перемещении файла.<br>';
                }
            } else {
                echo 'Загруженный файл не является JPEG или произошла ошибка при загрузке.<br>';
            }
        }
        ?>
    </div>

    <form enctype="multipart/form-data"
          action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
            <input type="file" name="fupload"><br>
            <button type="submit">Загрузить</button>
        </p>
    </form>
</body>
</html>
