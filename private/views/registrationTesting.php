<?php $email = 'yoikbenma•+*-/il@mail.com';
    if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo $email;
    }
    
?>