<?php
    require "dbconnect.php";
    if (true)
    {
        try {
            $sql = 'INSERT INTO rent(user_id, property_id, start_date, end_date, price) VALUES(:user_id, :property_id, :start_date, :end_date, :price)';
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':user_id', $_GET['user_id']);
            $stmt->bindValue(':property_id', $_GET['property_id']);
            $stmt->bindValue(':start_date', $_GET['start_date']);
            $stmt->bindValue(':end_date', $_GET['end_date']);
            $stmt->bindValue(':price', $_GET['price']);
            $stmt->execute();


            $_SESSION['msg'] = "Объект аренды добавлен.";

        } catch (PDOException $error) {
            console_log($error->getMessage());
            $_SESSION['msg'] = "Ошибка: " . $error->getMessage();
        }
    }
    header("Location: index.php?page=rent");
    exit();