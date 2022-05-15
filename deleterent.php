<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM rent WHERE rent_id=:rent_id';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':rent_id', $_GET['rent_id']);
        $stmt->execute();
        $_SESSION['msg'] = "Объект аренды удален.";

    } catch (PDOException $error) {
        $_SESSION['msg'] = "Ошибка: " . $error->getMessage();
    }

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
