<h1>Таблица объектов недвижимости</h1>
<table class="table table-striped" style="width: 70%; margin: 0 auto;">
    <tr>
        <th>Тип недвижимости</th>
        <th>Название</th>
        <th>Площадь</th>
        <th>Цена</th>
        <th>Адрес</th>
        <th>Состояние</th>
        <th>Описание</th>
        <th>Количество комнат</th>
        <th>Владелец недвижимости</th>
    </tr>
    <?php
        $result = $conn->query("SELECT * FROM property JOIN user ON (property.user_id = user.user_id)");
        while($row = $result->fetch())
        {
            $arenda = $row['rent'] == 1 ? 'В аренде' : 'Не в аренде';
            console_log($arenda);
            console_log($row);
            echo '<tr>';
            echo '<td>' . $row['type'] . '</td><td>' . $row['name'] . '</td>';
            echo '<td>' . $row['area'] . '</td><td>' . $row['price'] . '</td><td>' . $row['address'] . '</td>';
            echo '<td>' . $arenda . '</td><td>' . $row['description'] . '</td><td>' . $row['rooms'] . '</td>';
            echo '<td>' . $row['first_name'] . ' ' .$row['second_name'] . '</td>';
            echo '<td> <a href=deleteproperty.php?property_id=' . $row['property_id'] . '>Удалить</a>';
            echo '</tr>';
        }
    ?>
</table>

<div style="width: 30%; margin: 0 auto;">
    <h1 style="text-align: center;">Добавить объект аренды</h1>
    <form method="get" action="insertproperty.php">
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
            <input type="text" name="type" placeholder="type" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="name" placeholder="name" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" name="area" placeholder="area" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="address" placeholder="address" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" name="price" placeholder="price" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="description" placeholder="description" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" name="rooms" placeholder="rooms" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Добавить" class="btn btn-primary" class="form-control">
        </div>
    </form>
</div>




