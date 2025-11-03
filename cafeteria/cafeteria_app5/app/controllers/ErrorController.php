<?php
class ErrorController{
    public function show($message){
        require 'app/views/error/error.view.php';
    }
}
?>