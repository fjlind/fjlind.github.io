<?php

    $errors = "";
    $myemail = 'fjlind@asu.edu';//<—–Put Your email address here. if(empty($_POST['name']) ||

    empty($_POST['parent_first_name']) ||
    empty($_POST['parent_last_name']) ||
    empty($_POST['email_address']) ||
    empty($_POST['phone_num']) ||
    empty($_POST['player_first_name']) ||
    empty($_POST['player_last_name']) ||
    empty($_POST['player_dob']) ||
    empty($_POST['playergrade'])

    {
        $errors .= "\n Error: all fields are required";
    }

    $parFName = $_POST['parent_first_name'];
    $parLName = $_POST['parent_last_name'];
    $email_address = $_POST['email_address'];
    $phone = $_POST['phone_num'];
    $playerFName = $_POST['player_first_name'];
    $playerLName = $_POST['player_last_name'];
    $dob = $_POST['player_dob'];
    $grade = $_POST['playergrade'];

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
    {
        $errors .= "\n Error: Invalid email address";
    }

    if( empty($errors))
    {
        $to = $myemail;
        $email_subject = "Contact form submission: $playerLName";
        $email_body = "You have received a new league registration. ".
        " Here are the details:\n Parent First Name: $parFName \n ".
        "Email: $email_address\n Player First Name: \n $playerFName";
        $headers = "From: $myemail\n";
        $headers .= "Reply-To: $email_address";
        mail($to,$email_subject,$email_body,$headers);
        
        //redirect to the 'thank you' page
        header('Location: league_reg_form_thank_you.html');
    }

?>