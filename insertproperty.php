<?php
    require "dbconnect.php";
    $picture_url = '';
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
    if (true)
    {
        try {
            $sql = 'INSERT INTO property(user_id, type, name, area, address, price, description, rooms, path_p) VALUES(:user_id, :type, :name, :area, :address, :price, :description, :rooms, :path_p)';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':user_id', $_POST['user_id']);
            $stmt->bindValue(':type', $_POST['type']);
            $stmt->bindValue(':name', $_POST['name']);
            $stmt->bindValue(':area', $_POST['area']);
            $stmt->bindValue(':address', $_POST['address']);
            $stmt->bindValue(':price', $_POST['price']);
            $stmt->bindValue(':description', $_POST['description']);
            $stmt->bindValue(':rooms', $_POST['rooms']);
            $stmt->bindValue(':path_p', $picture_url);
            $stmt->execute();


            $_SESSION['msg'] = "Объект недвижимости добавлен.";

        } catch (PDOException $error) {
            $_SESSION['msg'] = "Ошибка: " . $error->getMessage();
        }
        echo $_SESSION['msg'];
    }
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();