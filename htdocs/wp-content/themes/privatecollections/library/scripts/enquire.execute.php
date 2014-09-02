<?php
require_once('../../../../../wp-load.php');

header("HTTP/1.0 200 OK");

function filterDefaultValue($string, $default) {
    if($string === $default) {
        return '';
    }else{
        return $string;
    }
}

function validateEmail ($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate ($string) {
    if(!empty($string)) {
        return true;
    }else{
        return false;
    }
}

function niceName($string) {
    return str_replace('_', ' ', $string);
}

try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $ex){
    die($ex->getMessage());
}

if (
    validate(filterDefaultValue($_POST['Name'], 'Name:')) &&
    validate(filterDefaultValue($_POST['Email'], 'Email:'))
) {
    try {
        $log_form = $conn->prepare('INSERT INTO ' . DB_ENQUIRY_LOGS_TBL . ' (name, email, message, products, date, unix) VALUES (:name, :email, :message, :products, :date, :unix)');

        $log_form->bindValue(':name',           $_POST['Name']);
        $log_form->bindValue(':email',          $_POST['Email']);
        $log_form->bindValue(':message',        filterDefaultValue($_POST['Message'], 'Message:'));
        
        if(isset($_POST['Products']) && !empty($_POST['Products'])){
            $log_form->bindValue(':products', implode(', ', $_POST['Products']));
        }else{
            $log_form->bindValue(':products',   '');
        }
        
        $log_form->bindValue(':date',           date('d-m-Y'));
        $log_form->bindValue(':unix',           time());
        
        if($log_form->execute()){
            //$to = strip_tags(get_option('enquiry_emails'));
            
            $to = 'kyle@fishgate.co.za';

            $subject = 'Private Collections Enquiry Form notification.';

            $headers = "From: " . strip_tags($_POST['Email']) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($_POST['Email']) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
            $body = 'A new Private Collections enquiry form has been submitted on ' . date('d-m-Y') . ':<br /><br />';
            
            foreach($_POST as $key => $val) {
                $body .= '<strong>' . niceName($key) . '</strong>: ';
                
                if(!is_array($val)) {
                    $body .= $val;
                }else{
                    $body .= implode(', ', $_POST['Products']);
                }
                        
                $body .= '<br />';
            }
            
            $mail = wp_mail($to, $subject, $body, $headers);
            
            if($mail) {
                echo 'success';
            }else{
                echo 'There was an error sending the notification email.';
            }
        }
     
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
} else {
    die('Please fill in all the required form fields correctly before submitting.');
}

?>
