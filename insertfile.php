<?php
    require "dbconnect.php";

    if ($file = fopen($_FILES['filename']['tmp_name'], 'r+')) {
        //получение расширения
        $ext = explode('.', $_FILES["filename"]["name"]);
        $ext = $ext[count($ext) - 1];
        $filename = 'file' . rand(100000, 999999) . '.' . $ext;
        $resource = Container::getFileUploader()->store($file, $filename);
        $picture_url = $resource['ObjectURL'];
        echo $picture_url;
    }
    else {
        echo "No photo";
    }

    try {
        require 'deletefile.php';
        $sql = 'INSERT INTO file(user_id, path) VALUES(:user_id, :picture_url)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':user_id', $_SESSION['user_id']);
        $stmt->bindValue(':picture_url', $picture_url);
        $stmt->execute();
        $_SESSION['msg'] = "Файл успешно добавлен";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления фото: " . $error->getMessage();
    }
    echo $_SESSION['msg'];
    // перенаправление на главную страницу приложения
    header('Location:http://webboard/index.php');
    exit();