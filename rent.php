<h1>Таблица объектов аренды</h1>
<table class="table table-striped" style="width: 70%; margin: 0 auto;">
    <tr>
        <th>rent_id</th>
        <th>user_id</th>
        <th>property_id</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>price</th>
        <th></th>
    </tr>
    <?php
        $result = $conn->query("SELECT * FROM rent");
        while($row = $result->fetch())
        {
            echo '<td>' . $row['rent_id'] . '</td><td>' . $row['user_id'] . '</td><td>' . $row['property_id'] . '</td>';
            echo '<td>' . $row['start_date'] . '</td><td>' . $row['end_date'] . '</td><td>' . $row['price'] . '</td>';
            echo '<td> <a href=deleterent.php?rent_id=' . $row['rent_id'] . '>Удалить</a>';
            echo '</tr>';
        }
    ?>
</table>

<h1>Добавить аренду</h1>
<form method="get" action="insertrent.php">
    <select name="user_id">
        <?php
        $result = $conn->query("SELECT * FROM user");
        while($row = $result->fetch())
        {
            echo '<option value="'.$row['user_id'].'">'.$row['first_name']. " ".$row['second_name'].'</option>';
        }
        ?>
    </select>
    <select name="property_id">
        <?php
        $result = $conn->query("SELECT * FROM property");
        while($row = $result->fetch())
        {
            echo '<option value="'.$row['property_id'].'">'.$row['name'].'</option>';
        }
        ?>
    </select>
    <input type="date" name="start_date" placeholder="start_date">
    <input type="date" name="end_date" placeholder="end_date">
    <input type="number" name="price" placeholder="price">
    <input type="submit" value="Добавить">
</form>