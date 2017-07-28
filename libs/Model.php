<?php 

class Model
{ 
    public function __construct()
    {

    }

    public function getArray()
    {       
        return array('%TITLE%' => 'Contact Form', '%ERRORS%' => 'Empty field', '%ERROR_NAME%' => ''); 
    }

    public function checkForm()
    {

        $error = [];

        foreach ($_POST as $key=>$val)
        {
            $_POST[$key] = trim(strip_tags($val));
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {

            $error[] = ['%ERROR_NAME%' => 'Email is not valid'];
        }

        if (strlen($_POST['name']) <= 2) 
        {

            $error[] = ['%ERROR_NAME%' => 'Name is not valid'];
        }

        if (strlen($_POST['message']) <= 2)
        {
            $error[] = ['%ERROR_MESSAGE%' => 'Message is not valid'];
        }

        if(empty($error))
        {
            return ['result' => true];
        }
        else 
        {
            return ['result' => false, 'message' => $error];
        }

    }

    public function sendEmail()
    {
        // return mail()
    }       
}

