<?php
//shortcode table to display sent messages
//We include the wp-load.php directory to use the wordpress database
$path = preg_replace( '/wp-content.*$/', '', __DIR__ );
require_once( $path . 'wp-load.php' );
function show_messages(){
    $messagesShow = new Messages('',''); 
    $responseQuery = $messagesShow->showMessages();

    $response = '
        <div>
        <table class="table" id="messages" style="">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Phone number</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th scope="col" width="50%">Response</th>
            </tr>
            </thead>
            <tbody>';
            foreach ($responseQuery as $key => $value){
                $response .= '<tr>
                    <th scope="row">'.$value['id'].'</th>
                    <td>'.$value['phoneNumber'].'</td>
                    <td>'.$value['message'].'</td>
                    <td>'.$value['date'].'</td>
                    <td>'.$value['confirmationCode'].'</td>
                </tr>';
            }
            $response .=' </tbody>
            </table>
        </div>';
        return $response;
}

add_shortcode("show_messages_table","show_messages");

?>