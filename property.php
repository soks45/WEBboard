<h1>Таблица объектов недвижимости</h1>
<table border="1">
    <tr>
        <th>property_id</th>
        <th>user_id</th>
        <th>rent</th>
        <th>type</th>
        <th>name</th>
        <th>area</th>
        <th>address</th>
        <th>price</th>
        <th>description</th>
        <th>rooms</th>
        <th></th>
    </tr>
    <?php
        $result = $conn->query("SELECT * FROM property");
        while($row = $result->fetch())
        {
            echo '<td>' . $row['property_id'] . '</td><td>' . $row['user_id'] . '</td><td>' . $row['rent'] . '</td>';
            echo '<td>' . $row['type'] . '</td><td>' . $row['name'] . '</td><td>' . $row['area'] . '</td>';
            echo '<td>' . $row['address'] . '</td><td>' . $row['price'] . '</td><td>' . $row['description'] . '</td>';
            echo '<td>' . $row['rooms'] . '</td>';
            echo '<td> <a href=deleteproperty.php?property_id=' . $row['property_id'] . '>Удалить</a>';
            echo '</tr>';
        }
    ?>
</table>

<h1>Добавить объект аренды</h1>
<form method="get" action="insertproperty.php">
    <select name="user_id">
        <?php
            $result = $conn->query("SELECT * FROM user");
            while($row = $result->fetch())
            {
                echo '<option value="'.$row['user_id'].'">'.$row['first_name']. " ".$row['second_name'].'</option>';
            }
        ?>
    </select>
    <input type="text" name="type" placeholder="type">
    <input type="text" name="name" placeholder="name">
    <input type="number" name="area" placeholder="area">
    <input type="text" name="address" placeholder="address">
    <input type="number" name="price" placeholder="price">
    <input type="text" name="description" placeholder="description">
    <input type="number" name="rooms" placeholder="rooms">
    <input type="submit" value="Добавить">
</form>



