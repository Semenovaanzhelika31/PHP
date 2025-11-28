<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файла на сервер</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .success { background-color: #dff0d8; color: #3c763d; }
        .error { background-color: #f2dede; color: #a94442; }
        .info { background-color: #d9edf7; color: #31708f; }
    </style>
</head>
<body>
    <h1>Загрузка файла на сервер</h1>

    <div>
        <?php
        if (isset($_FILES['fupload'])) {
            $file = $_FILES['fupload'];

            echo '<div class="info">';
            echo 'Имя файла: ' . htmlspecialchars($file['name']) . '<br>';
            echo 'Размер: ' . $file['size'] . ' байт<br>';
            echo 'Временное имя: ' . htmlspecialchars($file['tmp_name']) . '<br>';
            
            $mimeType = mime_content_type($file['tmp_name']) ?: 'unknown';
            echo 'Тип: ' . htmlspecialchars($mimeType) . '<br>';
            echo 'Код ошибки: ' . $file['error'] . '<br>';
            echo '</div>';

            if ($file['error'] !== UPLOAD_ERR_OK) {
                echo '<div class="error">Ошибка загрузки файла. Код ошибки: ' . $file['error'] . '</div>';
                exit;
            }

            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/bmp'];
            if (!in_array($mimeType, $allowedTypes)) {
                echo '<div class="error">Загруженный файл не является поддерживаемым изображением (JPEG, PNG, GIF, WebP, BMP).</div>';
                exit;
            }

            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $safeExtension = strtolower($extension);

            if (empty($safeExtension)) {
                if ($mimeType === 'image/jpeg') {
                    $safeExtension = 'jpg';
                } elseif ($mimeType === 'image/png') {
                    $safeExtension = 'png';
                } elseif ($mimeType === 'image/gif') {
                    $safeExtension = 'gif';
                } else {
                    $safeExtension = 'unknown';
                }
            }

            $newFilename = md5($file['name'] . time()) . '.' . $safeExtension;
            $uploadDir = 'upload/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $destination = $uploadDir . $newFilename;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                echo '<div class="success">';
                echo 'Файл успешно загружен!<br>';
                echo 'Путь: ' . htmlspecialchars($destination) . '<br>';
                echo 'Имя: ' . htmlspecialchars($newFilename);
                echo '</div>';
            } else {
                echo '<div class="error">Ошибка при перемещении файла в каталог ' . htmlspecialchars($uploadDir) . '</div>';
            }
        }
        ?>
    </div>

    <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            
            <label for="fupload">Выберите файл:</label>
            <input type="file" id="fupload" name="fupload" accept="image/*"><br>
            
            <button type="submit">Загрузить</button>
        </p>
    </form>
</body>
</html>
