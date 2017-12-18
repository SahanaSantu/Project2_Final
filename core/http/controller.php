<?php
namespace http;

//this is the controller class  to connect models with views and business logic
class controller 
{
//This is the template to get HTML template for the application and accepts the model.
    static public function getTemplate($template, $data = NULL)
    {
        $template = 'pages/' . $template . '.php';

        include $template;
    }
}