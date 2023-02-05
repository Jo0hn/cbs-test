<?php
//shortcode to generate the submission form
function add_message_form(){
    $response = '<form method="POST" action="'.site_url().'/wp-content/plugins/twilio/includes/process.php" id="message">
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" aria-describedby="phoneNumber" placeholder="Enter a phone number with a valid format +50378787878" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" rows="3" name="message" required></textarea>
                    </div>
                   
                    <input type="submit" class="btn btn-primary" name="btnguardar" value="Send">
                    
                </form>';
    //validation response
    if(isset($_GET['res'])){
        if($_GET['res']==1){
            $response .='<p><div class="alert alert-success" role="alert">Message sent successfully!</div></p>';
        }elseif($_GET['res']==2){
            $response .='<p><div class="alert alert-danger" role="alert">An unexpected error occurred!</div></p>';
        }elseif($_GET['res']==3){
            $response .='<p><div class="alert alert-danger" role="alert">Enter all the data!</div></p>';
        }elseif($_GET['res']==4){
            $response .='<p><div class="alert alert-danger" role="alert">Incorrect phone number format!</div></p>';
        }elseif($_GET['res']==5){
            $response .='<p><div class="alert alert-danger" role="alert">Telephone number not registered for testing!</div></p>';
        }elseif($_GET['res']==6){
            $response .='<p><div class="alert alert-warning" role="alert">The message was saved but could not be sent to your phone!</div></p>';
        }
    }
    return $response;
}
add_shortcode("show_message_form","add_message_form");
?>