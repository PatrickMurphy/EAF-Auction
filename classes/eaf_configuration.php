<?php

/**
 * @author 
 * @copyright 2013
 */


    class eaf_configuration{
        
        private $database;
        public $template_top;
        public $template_bottom;
        
        function eaf_configuration($db){
            $this->database = $db;
        }
        
        public function getValue($param_name){
            return array_shift(array_values($this->database->Select('value','eaf_configuration',array('parameter' => $param_name))));
            //$this->database->executeSQL('Select value FROM eaf_configuration where parameter=`'.$param_name.'`')
        }
        
        public function setValue($params_array){
            $this->database->Insert($params_array,'eaf_configuration');
        }
    }
?>