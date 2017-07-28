<?php
class Controller
{
    private $model;
    private $view;

    public function __construct ()
    {       
        $this->model = new Model();
        $this->view = new View(TEMPLATE);   

        if (!empty($_POST['email']))
        { 
            $post = $this->model->checkForm();  
            if($post['result'] === true)
            {
                $this->pageSendMail();
            }
            else
            {
                print_r($post['message']);
                $this->view->addToReplace($post['message']);

            }
         }
        else
        {
            $this->pageDefault();   
        }

        $this->view->templateRender();          
    }   

    private function pageSendMail ()
    {

        $this->model->sendEmail();

        $mArray = $this->model->getArray();     
        $this->view->addToReplace($mArray); 
    }   

    private function pageDefault ()
    {   
       echo 1;
       $mArray = $this->model->getArray();      
        $this->view->addToReplace($mArray);
    }               
}

