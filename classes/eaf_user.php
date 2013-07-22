<?php
class eaf_user {
    // Variables
    private $database;
    private $config;
    private $userdata = Array();
    
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
            $this->loadUser($cookie['id']); // Load Userdata from database.
            if($cookie['token'] == md5($this->getProperty('email') . sha1($this->getProperty('comailcode'))))
                return $this->storeUser();
        }        
    }
    
    private function loadUser($id){
        $this->userdata = Array();
        $this->userdata = $this->database->Select('*', 'eaf_users', array('id' => $id));
        return empty($this->userdata);
    }
        
    public function login($formdata){
        $this->userdata = $this->database->Select('*', 'eaf_users', array('username'=>$formdata['username'], 'password'=>MD5(strtolower($formdata['password']))));
        if($this->database->NumRows() > 0){
            $this->storeUser($formdata['rememberMe']);
            if ($formdata['redirect']['condition'] && !headers_sent()){ 
        	   header('Location: ' . urldecode($formdata['redirect']['url']) );
        	   exit;//To ensure security
        	}
            return true;
        }
        return false;
    }
    
    public function storeUser($remember = true){
        $_SESSION['user_id'] = $this->getProperty('id');
        $_SESSION['user_name'] = $this->getProperty('username');
        $_SESSION['privilege'] = $this->getProperty('privilege');
        if($remember)
            setcookie('userstate', base64_encode(serialize(array('username' => $this->getProperty('username'), 'token' => md5($this->getProperty('email').sha1($this->getProperty('comailcode'))), 'id' => $this->getProperty('id')))), time()+(60*60*24*31), '/', 'patrickmurphywebdesign.com');
    }
    
    public function logout($redirectTo=''){
        if(isset($_COOKIE['userstate']))
            setcookie('userstate','',time()-3600, '/', 'patrickmurphywebdesign.com');
        $_SESSION['privilege'] = '';
        $_SESSION['user_id'] = '';
        $_SESSION['user_name'] = '';
        session_destroy();
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
    
    public function getUserData(){
        return $this->userdata;
    }
    
    public function createUser($formdata){
        $formdata['password'] = md5(strtolower($formdata['password']));
        return $this->database->Insert($formdata, 'eaf_users');
    }
}
?>