<?php // This class displays an application error.  It is extended by eaf_error_exception. 
    class eaf_exception extends Exception {       
        
        public function error($message){
            $display  = '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">';
            $display .= '<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>';
            $display .= '<strong>Error:</strong><br />' . $message .'</div>';
            return $display;
        }
        
        public function displayError(){
            ob_clean(); // Clear buffer to make new page
            include('includes/template.top.php');
            echo '<div class="column" style="width:450px;">' . $this->error($this->message) . '</div>';
            include('includes/template.bottom.php');
        }
    }
?>