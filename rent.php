<h1 style="text-align: center; margin: 2vh auto 0;">Аренда</h1>
<table class="table table-striped" style="width: 70%; margin: 2vh auto 0;">
    <tr>
        <th>Имя арендатора</th>
        <th>Начало аренды</th>
        <th>Конец аренды</th>
        <th>Имя объекта недвижимости</th>
        <th>Цена</th>
        <th></th>
    </tr>
    <?php

        if ($_SESSION['is_admin'] !== '1') {
            $sql = "SELECT * FROM rent JOIN user ON (rent.user_id = user.user_id) JOIN property ON (rent.property_id = property.property_id) where rent.user_id =". $_SESSION['user_id'];
        } else {
            $sql = "SELECT * FROM rent JOIN user ON (rent.user_id = user.user_id) JOIN property ON (rent.property_id = property.property_id)";
        }
        $result = $conn->query($sql);
        while($row = $result->fetch())
        {
            console_log($row);
            echo '<td>' . $row['first_name'] . ' ' .$row['second_name'] . '</td>';
            echo '<td>' . $row['start_date'] . '</td><td>' . $row['end_date'] . '</td><td>' . $row['name'] . '</td><td>' . $row['price'] . '</td>';
            echo '<td> <a href=deleterent.php?rent_id=' . $row['rent_id'] . '>Удалить</a>';
            echo '</tr>';
        }
    ?>
</table>
