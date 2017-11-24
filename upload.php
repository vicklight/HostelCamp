<?php
if ($_FILES["file"]["name"] != ''){
    $test=explode(".",$_FILES["file"]["name"]);
    $extension=end($test);
    $name=rand(100,199) . '.' .$extension;
    $location='./images/'.$name;
    move_uploaded_file($_FILES["file"]["tmp_name"],$location);
    echo '<img src="'.$location.'" height="150" width="225"/><br>';
    echo "<input type='text' value='".$name."' id='photo1' disabled >";
}
?>
