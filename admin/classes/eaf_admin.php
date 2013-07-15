<?php
class eaf_admin {
        
        private $database;
        private $currentPage;
        private $config;
        private $user;
        
        function eaf_admin() {
            $this->database = new eaf_database('eaf_auction', 'pmphotog_eaf', 'almostover13');
            $this->config = new eaf_configuration($this->database);
            $this->user = new eaf_user($this->database,$this->config);
            
            if($this->authenticate())
                $this->pageSwitch();
                
            $this->createPage();

            $this->database->CloseConnection();
        }
        
        private function authenticate(){
            if($this->user->getPrivilege() >= 1)
                return true;
            else
                if(!headers_sent()){
    	           header('Location: ../login.php?redirect='.urlencode('admin/index.php?page='.$_GET['page']));
    	           exit;//To ensure security
                } 
            return false;
        }
        
        public function createPage(){
            ob_start();
            //include($this->config->getValue('admin_template_top'));
            include("includes/template.top.php");
            include($this->currentPage);
            include("includes/template.bottom.php");
            //include($this->config->getValue('admin_template_bottom'));
            ob_end_flush();
        }
        
        public function pageSwitch(){
            switch($_GET['page']){
                case 'users':
                    switch($_GET['subpage']){
                        case 'viewAll':
                        case 'view':
                        case 'add':
                        case 'edit':
                            $this->currentPage = 'includes/home.php';
                    }
                break;
                case 'items':
                    switch($_GET['subpage']){
                        case 'view':
                            $this->currentPage = 'includes/items/view.php';
                            break;
                        case 'add':
                            $this->currentPage = 'includes/items/add.php';
                            break;
                        case 'edit':
                        case 'hotitems':
                            $this->currentPage = 'includes/home.php';
                    }
                break;
                case 'categories':
                    switch($_GET['subpage']){
                        case 'add':
                        case 'view':
                        case 'edit':
                            $this->currentPage = 'includes/home.php';
                    }
                break;
                case 'reports':
                    switch($_GET['subpage']){
                        case 'statistics':
                        case 'archives':
                            $this->currentPage = 'includes/home.php';
                    }
                break;
                case 'config':
                    $this->currentPage = 'includes/home.php';
                break;
            }
        }        
    }

?>