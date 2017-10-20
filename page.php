<?php

abstract class page{

    protected  $html;
    public function __construct(){

        $this->html .= '<link rel="stylesheet" href="styles/styles.css">';
        $this->html .= '<html><body>';
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


?>