<?php 

class Model
{ 
    public function __construct ()
    {

    }

    public function getArray ()
    {
        return [
            '%TITLE%' => 'Contact Form',
            '%PATH%' => '/php/task7/',
            '%POST_NAME%' => '',
            '%POST_EMAIL%' => '',
            '%POST_MESSAGE%' => '',
            '%POST_COURSE_HTML%' => '',
            '%POST_COURSE_PHP%' => '',
            '%POST_COURSE_PERL%' => '',
            '%ERROR_NAME%' => '',
            '%ERROR_SUBJECT%' => '',
            '%ERROR_EMAIL%' => '',
            '%ERROR_MESSAGE%' => '',
            '%SUCCESS%' => '',
        ];
    }

    public function checkForm ()
    {
        $error = [];
        $data  = [];
        $post  = [];

        foreach ($_POST as $key=>$val)
        {
            $_POST[$key] = trim(strip_tags($val));
        }

        /*==================== check validate field name ===================*/

        if (strlen($_POST['name']) <= 2)
        {
            $error[] = ['%ERROR_NAME%' => 'Field NAME - must be more than 2 characters'];
        }
        elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['name']))
        {
            $error[] = ['%ERROR_NAME%' => 'Field NAME - must be only letters'];
        }
        else
        {
            $post[] = ['%POST_NAME%' => $_POST['name']];
        }

        /*==================== check validate field subject ===================*/

        if (empty($_POST['subject']))
        {
            $error[] = ['%ERROR_SUBJECT%' => 'Please select subject'];
        }
        else
        {
            switch ($_POST['subject'])
            {
                case 'Course HTML':
                    $post[] = ['%POST_COURSE_HTML%' => 'selected'];
                    break;
                case 'Course PHP':
                    $post[] = ['%POST_COURSE_PHP%' => 'selected'];
                    break;
                case 'Course PERL':
                    $post[] = ['%POST_COURSE_PERL%' => 'selected'];
                    break;
            }
        }

        /*==================== check validate field email ===================*/

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $error[] = ['%ERROR_EMAIL%' => 'Email is not valid'];
        }
        else
        {
            $post[] = ['%POST_EMAIL%' => $_POST['email']];
        }

        /*==================== check validate field message ===================*/

        if (strlen($_POST['message']) <= 2)
        {
            $error[] = ['%ERROR_MESSAGE%' => 'Message is not valid'];
        }
        else
        {
            $post[] = ['%POST_MESSAGE%' => $_POST['message']];
        }


        if (!empty($error))
        {
            $errors = call_user_func_array('array_merge', $error);
            $data[] = $errors;
        }

        if (!empty($post))
        {
            $postData = call_user_func_array('array_merge', $post);
            $data[] = $postData;
        }

        $data = call_user_func_array('array_merge', $data);

        if (empty($error))
        {
            return ['result' => true];
        }
        else 
        {
            return ['result' => false, 'data' => $data];
        }

    }

    public function sendEmail ()
    {

        $to      = EMAIL;
        $subject = $_POST['subject'];
        $message = '
                Name: '.$_POST['name'].'<br>
                Subject: '.$_POST['subject'].'<br>
                Email: <a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a><br>
                Message: '.$_POST['message'].'<br>
                IP: '.$this->getIpAddress().'<br>
                Date: '. $this->getTime();
        
        $headers =
            'From: '.$_POST['email']. "\r\n" .
            'Reply-To: '.$_POST['email']. "\r\n" .
            'X-Mailer: PHP/' . phpversion();


        if (mail($to, $subject, $message, $headers))
        {
            return ['result' => true, 'data' => ['%SUCCESS%' => 'SUCCESS, Message send']];
        }
        else
        {
            return ['result' => false, 'data' => ['%SUCCESS%' => 'ERROR']];
        }
    }

    private function getIpAddress ()
    {
        return getHostByName(getHostName());
    }

    private function getTime ()
    {
        return date('Y-m-d H:m:i', time());
    }
}

