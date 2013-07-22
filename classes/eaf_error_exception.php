<?php // This class handles page errors, can be passed as an array to show multiple errors at once.
class eaf_error_exception extends eaf_exception {
    private $errors = Array();
    private $array = true;
    
    public function __construct($messages){
        if(is_array($messages)){
            $this->errors = $messages;
            $m = 'Eaf_error_exception';
    } else if(is_string($messages)){
            $this->array = false;
            $m = $messages;    
        }
        
        parent::__construct($m);
    }
    
    public function displayErrors(){
        $display = '<span class="column" style="width:660px;">';
        if($this->array)
            foreach($this->errors as $code => $text)
                $display .= $this->error($text);
        else
            $display .= $this->error($this->getMessage());
        
        return $display . '</span><br />'; 
    }
}
?>