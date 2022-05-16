<div style="width: 30%; margin: 5vh auto 0;">
<!--    --><?php
//        $sql = "SELECT * FROM property WHERE property_id=".$_SESSION['property_id'];
//        $result = $conn->query($sql);
//        while($row = $result->fetch())
//        {
//            echo '<img src="'.$row['path'].'" alt="No image" style="max-width: 300px; max-height: 300px;">';
//        }
//    ?>
    <h1 style="text-align: center;">Арендовать</h1>
    <form method="get" action="insertrent.php">
        <div class="mb-3">
            <select name="user_id" class="form-select">
                <?php
                    $sql = "SELECT * FROM user WHERE user_id=".$_SESSION['user_id'];
                    $result = $conn->query($sql);
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
                    $sql = "SELECT * FROM property WHERE".$_GET['property_id'];
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
            <input type="number" name="price" placeholder="price" class="form-control">
        </div>
        <div class="mb-3" style="display: flex; justify-content: start">
            <input type="submit" value="Добавить" class="btn btn-primary" class="form-control">
        </div>
    </form>
</div>