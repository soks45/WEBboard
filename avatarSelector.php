<?php
echo '<div style="margin: 12vh auto 0; border: 1px solid black; border-radius: 10px; padding: 15px; 
        max-width: 700px; max-height: 800px; min-height: 500px; 
        display: flex; align-items: center; flex-direction: 
        column; justify-content: space-between; 
        -webkit-box-shadow: 4px 4px 8px 0px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 4px 4px 8px 0px rgba(34, 60, 80, 0.2);
        box-shadow: 4px 4px 8px 0px rgba(34, 60, 80, 0.2);">
<h2 style="text-align: center; margin-top: 10px">Сменить аватар</h2>
<div style="display: flex; justify-content: center; margin-top: 30px;">
    <img src="'.$_SESSION['path'].'" alt="No Avatar" style="width: 400px; height: 400px; border-radius: 50%"/>
</div>
<div style="display: flex; justify-content: center; align-items: center;">

<form style="display: flex; margin-top: 20px; margin-bottom: 0; width: 100%;" method="post" action="insertfile.php" enctype="multipart/form-data">';
echo '<input type="file" class="mb-3" name="filename" style="margin-right: 50px">';
echo '<input class="btn btn-primary" type="submit" value="Создать" style="margin-left: 50px" id="id">';
'</form>
</div>
</div>';