<?php
class ErrorController{


    public function __construct(){

    }

    public function show($message){
        require 'app/views/error/error.view.phtml';
    }
}
?>