<?php
class eaf_user {
    // Variables
    private $database;
    private $config;
    private $userdata;
    
    function eaf_user($db, $cfg, $id=''){
        $this->database = $db;
        $this->config = $cfg;
        
        $this->checkForUser($id);
    }
    
    private function checkForUser($id){
        if($id != '')
            return $this->loadUser($id);
        if(isset($_SESSION['user_id']) && !$this->is_loaded())
            return $this->loadUser($_SESSION['user_id']);
        if(isset($_COOKIE['userstate']) && !$this->is_loaded()){
            $cookie = unserialize(base64_decode($_COOKIE['userstate']));
            return $this->login($cookie['username'], $cookie['password']);
        }        
    }
    
    private function loadUser($id){
        $this->database->Select('*', "eaf_users", array('id' => $id));
        $this->userdata = $this->database->ArrayResult();
        return true;
    }
        
    public function login($user, $pass, $remember = false, $redirectTo=''){
        $this->database->Select('*', "eaf_users", array('username'=>$user, 'password'=>MD5(strtolower($pass))));
        if($this->database->NumRows() > 0){
            $this->userdata = $this->database->ArrayResult();
            $_SESSION['user_id'] = $this->userdata['id'];
            $_SESSION['user_name'] = $this->userdata['username'];
            $_SESSION['privilege'] = $this->userdata['privilege'];
            if($remember)
                setcookie('userstate', base64_encode(serialize(array('username' => $user, 'password' => $pass, 'id' => $this->userdata['id']))), time()+(60*60*24*31), '/', 'patrickmurphywebdesign.com');
            if ( $redirectTo != '' && !headers_sent()){
        	   header('Location: '.$redirectTo );
        	   exit;//To ensure security
        	}
            return true;
        }
        return false;
    }
    
    public function logout($redirectTo=''){
        if(isset($_COOKIE['userstate']))
            setcookie('userstate','',time()-3600);
        $_SESSION['privilege'] = '';
        $_SESSION['user_id'] = '';
        $_SESSION['user_name'] = '';
        $this->userdata = '';
        if ( $redirectTo != '' && !headers_sent()){
    	   header('Location: '.$redirectTo );
    	   exit;//To ensure security
    	}
    }
    
    public function is($prop){
        return $this->getProperty($prop)==1?true:false;
    }
    
    function is_loaded(){
        return empty($this->userdata['id']) ? false : true;
    }
    
    public function getProperty($property) {
        if(isset($this->userdata[$property]))
            return $this->userdata[$property];
    }
    
    public function getPrivilege(){
        return $this->getProperty('privilege');
    }
    
    public function createUser($formdata){
        $formdata['password'] = md5(strtolower($formdata['password']));
        return $this->database->Insert($formdata, 'eaf_users');
    }
}
?>