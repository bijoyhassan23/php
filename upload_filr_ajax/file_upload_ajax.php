<?php

if(isset($_FILES["imgup"])){
    echo ($_FILES['imgup']['name']);
    move_uploaded_file($_FILES['imgup']['tmp_name'],  $_FILES['imgup']['name']);
}