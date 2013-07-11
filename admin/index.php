<?php
     session_start();
    //output buffering

    require_once('../classes/eaf_database.php');
    require_once('../classes/eaf_configuration.php');
    require_once('classes/eaf_admin.php');
    
    try{
        $admin = new eaf_admin();
    }catch(Exception $e){
        echo $e->errorMessage();
    }
?>