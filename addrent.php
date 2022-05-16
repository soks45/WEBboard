<div style="width: 30%; margin: 5vh auto 0;">
    <h1 style="text-align: center;">Арендовать</h1>
    <?php
        $sql = "SELECT * FROM property WHERE property_id=".$_GET['property_id'];
        $result = $conn->query($sql);
        while($row = $result->fetch())
        {
            echo '<img src="'.$row['path_p'].'" alt="No image" style="width: max-content; height: max-content; max-height: 300px; margin-left: 7vh">';
        }
    ?>
    <form method="get" action="insertrent.php">
        <div class="mb-3">
            <select name="user_id" class="form-select" >
                <?php
                    $sql = "SELECT * FROM user WHERE user_id=".$_SESSION['user_id'];
                    $result = $conn->query($sql);
                    while($row = $result->fetch())
                    {
                        echo '<option readonly value="'.$row['user_id'].'">'.$row['first_name']. " ".$row['second_name'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <select name="property_id" class="form-select">
                <?php
                    $sql = "SELECT * FROM property WHERE property_id=".$_GET['property_id'];
                    $result = $conn->query($sql);
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
            <?php
                echo '<input type="number" name="price" placeholder="price" class="form-control" value="'.$_GET['price'].'" readonly>'
            ?>
        </div>
        <div class="mb-3" style="display: flex; justify-content: start">
            <input type="submit" value="Добавить" class="btn btn-primary" class="form-control">
        </div>
    </form>
</div>