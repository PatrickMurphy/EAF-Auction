<?php

/**
 * @author 
 * @copyright 2013
 */


    class eaf_configuration{
        
        private $database;
        public $template_top;
        public $template_bottom;
        
        function __construct($db){
            $this->database = $db;
        }
        
        public function getValue($param_name){
            return $this->database->executeSQL('Select value FROM eaf_configuration where parameter=`'.$param_name.'`')[0];
        }
        
        public function setValue($params_array){
            $this->database->Insert($params_array,'eaf_configuration');
        }
    }
?>