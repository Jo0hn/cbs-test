<?php
//class to store messages
class Messages{
    public $phoneNumber;
    public $message;
    public $confirmationCode;
    public $idMessage;
    //class constructor
    public function __construct($phoneNumber, $message){
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
        $this->confirmationCode = "";
        $this->idMessage = "";
        
    }

    public function saveMessage() {
        global $wpdb;
        $tabla = "{$wpdb->prefix}message";
            $datos = [
                'date' => date("Y-m-d H:i:s"),
                'phoneNumber' => $this->phoneNumber,
                'message' => $this->message
            ];
            $wpdb->insert($tabla,$datos);
            $lastid = $wpdb->insert_id;
            return $lastid;
            
    }

    public function sendMessage($idMessage, $confirmationCode) {
       $this->confirmationCode=$confirmationCode;
       $this->idMessage=$idMessage;
        global $wpdb;
    
        $tabla = "{$wpdb->prefix}twilio_record";
            $datos = [
                'date' => date("Y-m-d H:i:s"),
                'confirmationCode' => $this->confirmationCode,
                'idMessage' => $this->idMessage
            ];
            $respuesta =  $wpdb->insert($tabla,$datos);

        
    }

    public function showMessages() {
        global $wpdb;
        $tabla = "{$wpdb->prefix}message";
        $tabla2 = "{$wpdb->prefix}twilio_record";
        $query = "SELECT * FROM wp_message INNER JOIN wp_twilio_record on wp_message.id = wp_twilio_record.idMessage";
        $resultado = $wpdb->get_results($query,ARRAY_A);
        return $resultado;
    }
}

?>

