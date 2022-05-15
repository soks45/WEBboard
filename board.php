<div style="width: 70%; background-color: antiquewhite; margin: 0 auto; border-radius: 30px; padding-top: 10px; padding-bottom: 10px; margin-top: 20px">
    <h1 style="text-align: center">Объявления</h1>
<?php
    $result = $conn->query("SELECT * FROM property JOIN user ON (property.user_id = user.user_id)");
    while ($row = $result->fetch()) {
        console_log($row);
        $avatar = $row['path'];
        if ($avatar === '') {
            $avatar = 'https://cdn-icons-png.flaticon.com/128/456/456212.png';
        }
        $property_image = $row['path_p'];
        if ($property_image === '') {
            $property_image = 'https://avatars.mds.yandex.net/get-yablogs/38241/file_1556638122894/orig';
        }
        echo '
                <div style="width: 90%; background-color: blanchedalmond; margin: 2vh auto; border-radius: 30px; border: 1px solid black;
                                        display: flex; justify-content: space-between; padding: 25px 35px 25px 35px; align-items: flex-start; 
                                        -webkit-box-shadow: -11px -9px 5px -10px rgba(34, 60, 80, 0.6) inset;
                                        -moz-box-shadow: -11px -9px 5px -10px rgba(34, 60, 80, 0.6) inset;
                                        box-shadow: -11px -9px 5px -10px rgba(34, 60, 80, 0.6) inset;;"
                >
                    <div style="width: 20%; border-radius: 10px; display: flex; justify-content: center; align-items: center">
                        <img src="'.$property_image.'" alt="No image" style="border-radius: 20px; width: 90%; height: 90%">
                    </div>
                    <div style="width: 50%; border-radius: 10px; display: flex; flex-direction: column; padding: 15px; box-sizing: border-box">
                        <h2>'.$row['rooms'].'-комн. '.$row['type'].', '.$row['area'].' м²</h2>
                        <p>'.$row['adress'].'</p>
                        <h2>'.$row['price'].' ₽/мес</h2>
                        <div style="font-size: small">'.$row['description'].'</div>
                    </div>
                    <div style="width: 20%; background-color: bisque; border-radius: 10px; display: flex; 
                                flex-direction: column; justify-content: center; align-items: center; border: 1px solid dimgrey;
                                -webkit-box-shadow: -11px -9px 5px -10px rgba(34, 60, 80, 0.6) inset;
                                -moz-box-shadow: -11px -9px 5px -10px rgba(34, 60, 80, 0.6) inset;
                                box-shadow: -11px -9px 5px -10px rgba(34, 60, 80, 0.6) inset;">
                        <img src="'.$avatar.'" style="height: 15vh; width: 15vh; border-radius: 50%; margin: 2vh" alt="No Avatar">
                        <h3>'.$row['first_name'].' '.$row['second_name'].'</h3>
                    </div>
                </div>
        ';
    }
?>
</div>



