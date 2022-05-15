<?php
    require "dbconnect.php";
    try {
        $result = $conn->query("SELECT * FROM file WHERE user_id=".$_SESSION['user_id']);
        $row = $result->fetch();
        try {
            $resource = Container::getFileUploader()->delete($row['path']);
        } catch (S3Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
        }
        if ($result->rowCount() == 0) throw new PDOException('Файл не найден');
        $sql = 'UPDATE user SET path=:id WHERE user_id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_SESSION['user_id']);
        $stmt->bindValue(':id', '');
        $stmt->execute();
        $_SESSION['msg'] = "Файл успешно удален";
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка удаления фото: " . $error->getMessage();
    }
    echo $_SESSION['msg'];
