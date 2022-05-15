<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM property WHERE property_id=:property_id';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':property_id', $_GET['property_id']);
        $stmt->execute();
        $_SESSION['msg'] = "Объект недвижимости удален.";

    } catch (PDOException $error) {
        $_SESSION['msg'] = "Ошибка: " . $error->getMessage();
    }
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();