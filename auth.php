<?php
    if (isset($_POST["login"]) and $_POST["login"]!='')
    {
        try {
            $sql = 'SELECT user_id, first_name, second_name, md5password, login, is_admin, path FROM user WHERE login=(:login)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':login', $_POST['login']);
            $stmt->execute();
        } catch (PDOexception $error) {
            $msg = "Ошибка аутентификации: " . $error->getMessage();
        }

        if ($row=$stmt->fetch(PDO::FETCH_LAZY))
        {
            if (MD5($_POST["password"])!= $row['md5password']) $msg = "Неправильный пароль!";
            else {
                $_SESSION['login'] = $_POST["login"];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['second_name'] = $row['second_name'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['is_admin'] = $row['is_admin'];
                $_SESSION['path'] = $row['path'];
                $msg =  "Вы успешно вошли в систему";
            }
        }
        else $msg =  "Неправильное имя пользователя!";

    }

    if (isset($_GET["logout"]))
    {
        session_unset();
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit( );
    }