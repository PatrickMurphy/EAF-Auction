<?php
class eaf_user {
    // Variables
    private $database;
    private $config;
    private $admin;
    
    function eaf_user($db, $cfg){
        $this->database = $db;
        $this->config = $cfg;
    }
    
    public function authenticate(){
        if($_SESSION['privledge'])
            return true;
    }
    
    public function login($user, $pass){
        $this->database->Select('id, privledge_level', "eaf_users", array('username'=>$user, 'password'=>$pass));
        if($this->database->NumRows() > 0){
            $userInfo = $this->database->ArrayResult();
            $_SESSION['user_id'] = $userInfo[0];
            $_SESSION['user_name'] = $user;
            $_SESSION['privledge'] = $userInfo[1];
            return true;
        }
    }
}
?>