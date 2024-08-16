<?php

$email = (isset($_POST['email'])) ? clean($_POST['email']) : false;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error, "Email format error");
}

if (users_according_email($email)) {
    $reciver_email = $email;
    $contact_id = users_contact_id_according_email($email);
    $reciver_name = contacts_field_id('name', $contact_id);
    $reciver_lastname = contacts_field_id('lastname', $contact_id);
    $reciver = "$reciver_name $reciver_lastname";
    $code = magia_uniqid();
    if (!$reciver_email) {
        array_push($error, '$reciver_email no enviado');
    }
    if (!$contact_id) {
        array_push($error, '$contact_id no enviado');
    }
    users_ask_pass_add(
            $contact_id, $code, null, 0
    );
    $email_Subject = "$config_company_name Lost password";
    $email_Body = " Hi $reciver_name,
We’ve received a request to reset your password.
If you didn’t make the request, just ignore this message. Otherwise, you can reset your password.
<a href=\"index.php?c=home&a=updatePassword&code=$code&email=$reciver_email\">Reset your password</a>
Thanks,
The $config_company_name team ";
    $email_AltBody = '$email_AltBody';
    ##----------------------------------------------------------------------                
    include controller("emails", "send_email");
    ##----------------------------------------------------------------------
    message("info", "Check your email");
    include view("home", "forgetPassword");
}
    