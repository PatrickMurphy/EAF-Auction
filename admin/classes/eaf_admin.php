<?php
class eaf_admin {
        
        private $database;
        private $currentPage;
        private $config;
        public $user;
        
        function eaf_admin() {
            $this->database = new eaf_database('pmphotog_eaf', 'pmphotog_eaf', 'almostover13');
            $this->config = new eaf_configuration($this->database);
            $this->user = new eaf_user($this->database,$this->config);
            
            if($this->authenticate())
                $this->currentPage = $this->pageSwitch($_GET['page'], $_GET['subpage']);
                
            $this->createPage();

            $this->database->CloseConnection();
        }
        
        private function authenticate(){
            if(isset($_SESSION['user_id']) && $this->user->getPrivilege() >= 1)
                return true;
            else
                if(!headers_sent()){
    	           header('Location: ../login.php?redirect='.urlencode('admin/index.php?page='.$_GET['page']));
    	           exit;//To ensure security
                } 
            return false;
        }
        
        public function createPage(){
            //include($this->config->getValue('admin_template_top'));
            include("includes/template.top.php");
            ob_start(); // Buffer output of page to allow for errors printed at top
            try{
                (include $this->currentPage) or $this->throwError('The page: "' . $this->currentPage . '" does not exist.');
            }catch(eaf_error_exception $e){
                $errors = $e->displayErrors();
                $ob     = ob_get_clean();
                echo $errors . $ob;
            }
            ob_end_flush();
            include("includes/template.bottom.php");
            //include($this->config->getValue('admin_template_bottom'));
        }
        
        public function pageSwitch($page, $subpage){
            switch($page){
                case 'users':
                    switch($subpage){
                        case 'viewAll':
                        case 'view':
                        case 'add':
                        case 'edit':
                            return 'includes/home.php';
                    }
                break;
                case 'items':
                    switch($subpage){
                        case 'view':
                            return 'includes/items/view.php';
                            break;
                        case 'add':
                            return 'includes/items/add.php';
                            break;
                        case 'edit':
                        case 'hotitems':
                            return 'includes/home.php';
                    }
                break;
                case 'categories':
                    switch($subpage){
                        case 'add':
                        case 'view':
                        case 'edit':
                            return 'includes/home.php';
                    }
                break;
                case 'reports':
                    switch($subpage){
                        case 'statistics':
                        case 'archives':
                            return 'includes/home.php';
                    }
                break;
                case 'config':
                    return 'includes/home.php';
                break;
                
                default:
                    return 'includes/home.php';
            }
        }
        
        public function getCurrentPage(){
            return $this->currentPage;
        }
        
        private function throwError($message = null, $code = null){
            throw new eaf_exception($message);
        }       
    }

?>