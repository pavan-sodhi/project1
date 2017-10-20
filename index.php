<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

    class manage{
        public static function autoload($class){
        include $class . '.php';
        }
    }
spl_autoload_register(array('manage', 'autoload'));


$obj = new main(); // instantiate obj
    class main{
        public function __construct(){
        $pageRequest = 'upload';// set default when np parameters are in URL

            if(isset($_REQUEST['page']))//check if there are parameters
            {
                //load the type of page the request wants into page request
            $pageRequest = $_REQUEST['page'];
            }
            //instantiate the class that is being requested
            $page = new $pageRequest;
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $page->get();
            }
            else{
            $page->post();
            }
            }
            }


?>