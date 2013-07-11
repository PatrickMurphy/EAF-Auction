<?php
class eaf_admin {
        
        private $database;
        private $currentPage;
        private $config;
        
        function __construct() {
            $this->database = new eaf_database('eaf_auction', 'eaf_mysql', 'almostover13');
            $this->config = new eaf_configuration($this->database);
            
            if($this->authenticate())
                $this->pageSwitch();
            
            $this->createPage();
        }
        
        private function authenticate(){
            if($_SESSION['auth'] && $_SESSION['admin']){
                return true;
            }else{
                $this->currentPage = 'includes/login.php';
                return false;
            }
        }
        
        public function createPage(){
            //include($this->config->getValue('admin_template_top'));
            include("includes/template.top.php");
            include($this->currentPage);
            include("includes/template.bottom.php");
            //include($this->config->getValue('admin_template_bottom'));
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
                case 'login':
                    $this->currentPage = 'includes/login.php';
                break;
            }
        }        
    }

?>