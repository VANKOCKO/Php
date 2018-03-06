<?php
    @ini_set('display_errors', 'on');
    $db = new PDO('mysql:host=mysql-kockoconsulting.alwaysdata.net;dbname=kockoconsulting_db','153498','root');
    $coordX =$_POST['coordX'];
    $coordY =$_POST['coordY'];
    $stm=$db->prepare("INSERT INTO Markers(coordX,coordY) VALUE($coordX,$coordY)");
    $stm->execute();
    
                      
?> 