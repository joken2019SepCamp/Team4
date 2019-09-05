<?php
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        echo $title;
    }
    echo '<br>';
    if(isset($_POST['maintext'])){
        $maintext = $_POST['maintext'];
        echo $maintext;
    }
?>