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

    abstract class page{
// add html structure check protected class html
    public $html;
    public function __construct(){
        $this->html .= '<html>';
        $this->html .= '<link rel="stylesheet" href="styles/styles.css">';
        $this->html .= '<body>';
    }


    //destruct function and html print
    public function __destruct(){
        $this->html .= '</body></html>';
        printfunc::printThis($this->html);
    }

    public function get() {

        echo 'Default get message';
    }

    public function post() {
        print_r($_POST);
    }
}

class upload extends page
{
    public function get()
    {
        $form = '<form action="upload.php" method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit" value="Upload File" name="submit">';
        $form .= '</form>';
        $this->html .= htmltags::headingOne('IS 601 :: Project :: Upload a CSV File to view as a Table');
        $this->html .= $form;
    }

}



?>