<h1>Таблица объектов аренды</h1>
<table class="table table-striped" style="width: 70%; margin: 0 auto;">
    <tr>
        <th>Имя арендатора</th>
        <th>Начало аренды</th>
        <th>Конец аренды</th>
        <th>Имя объекта недвижимости</th>
        <th>Цена</th>
    </tr>
    <?php
        $result = $conn->query("SELECT * FROM rent JOIN user ON (rent.user_id = user.user_id) JOIN property ON (rent.property_id = property.property_id)");
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

<div style="width: 30%; margin: 0 auto;">
    <h1 style="text-align: center;">Добавить аренду</h1>
    <form method="get" action="insertrent.php">
        <div class="mb-3">
            <select name="user_id" class="form-select">
                <?php
                $result = $conn->query("SELECT * FROM user");
                while($row = $result->fetch())
                {
                    echo '<option value="'.$row['user_id'].'">'.$row['first_name']. " ".$row['second_name'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <select name="property_id" class="form-select">
                <?php
                $result = $conn->query("SELECT * FROM property");
                while($row = $result->fetch())
                {
                    echo '<option value="'.$row['property_id'].'">'.$row['name'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="date" name="start_date" placeholder="start_date" class="form-control">
        </div>
        <div class="mb-3">
            <input type="date" name="end_date" placeholder="end_date" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" name="price" placeholder="price" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Добавить" class="btn btn-primary" class="form-control">
        </div>
    </form>
</div>