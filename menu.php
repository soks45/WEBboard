<?php
    if (!isset($_SESSION['login']) )
    {
        echo "<form method='post'>";
        echo "Имя пользователя:<input type=text name='login'/><br>";
        echo "Пароль:<input type=password name='password'/><br>";
        echo "<input type='submit' value='Войти'/>";
        echo "</form>";
    }
    else {
        echo "Привет, " . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . "<br>";
        echo "<a href='?logout=1'>Выйти из системы</a>";
    }
?>
<ul >
    <li style="display: inline"><a href="index.php?page=rent">Аренда</a></li>
    <li style="display: inline"><a href="index.php?page=property">Объекта недвижимости</a></li>
</ul>
