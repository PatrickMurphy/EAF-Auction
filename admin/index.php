<?php
    session_start();
    ob_start();    //output buffering

    require_once('../classes/eaf_database.php');
    require_once('../classes/eaf_configuration.php');
    require_once('../classes/eaf_user.php');
    require_once('../classes/eaf_exception.php');
    require_once('../classes/eaf_error_exception.php');
    require_once('classes/eaf_admin.php');
    
    try{
        $admin = new eaf_admin();
        if($_GET['debug']==1){   
            if(isset($_GET['clean']))
                ob_clean();
            echo '<h1>UserData</h1><pre>';
            print_r($admin->user->getUserData());
            echo '</pre><br /> <hr /> <Br />';
            
            echo '<h1>Session</h1><pre>';
            print_r($_SESSION);
            echo '</pre><br /> <hr /> <Br />';
            
            echo '<h1>Cookies</h1><pre>';
            print_r($_COOKIE);
            echo '</pre><br /> <hr /> <Br />';
            
            echo '<h1>Post</h1><pre>';
            print_r($_POST);
            echo '</pre><br /> <hr /> <Br />';
            
            echo '<h1>Get</h1><pre>';
            print_r($_GET);
            echo '</pre><br /> <hr /> <Br />';
            
            echo '<h1>Server</h1><pre>';
            print_r($_SERVER);
            echo '</pre><br /> <hr /> <Br />';
        }
    }catch(eaf_exception $e){
        $e->displayError();
    }
    ob_end_flush();
?>