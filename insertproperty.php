<?php
    require "dbconnect.php";
    if (true)
    {
        try {
            $sql = 'INSERT INTO property(user_id, type, name, area, address, price, description, rooms) VALUES(:user_id, :type, :name, :area, :address, :price, :description, :rooms)';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':user_id', $_GET['user_id']);
            $stmt->bindValue(':type', $_GET['type']);
            $stmt->bindValue(':name', $_GET['name']);
            $stmt->bindValue(':area', $_GET['area']);
            $stmt->bindValue(':address', $_GET['address']);
            $stmt->bindValue(':price', $_GET['price']);
            $stmt->bindValue(':description', $_GET['description']);
            $stmt->bindValue(':rooms', $_GET['rooms']);
            $stmt->execute();


            $_SESSION['msg'] = "Категория добавлена.";

        } catch (PDOException $error) {
            console_log($error->getMessage());
            $_SESSION['msg'] = "Ошибка: " . $error->getMessage();
        }
    }
    else
    {
        $_SESSION['msg'] = "Ошибка: Имя категории должно содержать не менее 3х символов.";
    }
    header('Location:http://webboard');
    exit();