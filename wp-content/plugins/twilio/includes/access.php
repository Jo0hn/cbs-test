<?php
//class to extract the credentials
class Access{
    public $sid;
    public function __construct($sid){
        $this->sid = $sid;
    }

    public function validateAccess() {
    
        global $wpdb;
        $tabla = "{$wpdb->prefix}twilio_access";
        $query = "SELECT * FROM $tabla WHERE sid='$this->sid'";
        $resultado = $wpdb->get_row($query);
        return $resultado;
            
    }


    
}

?>