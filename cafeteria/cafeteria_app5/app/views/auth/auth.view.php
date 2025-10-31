<?php

class AuthView {

    public function showLogin($error = null) {
        require_once 'app/templates/form.login.phtml';
    }

    public function showRegister($error = null) {
        require_once 'app/templates/form.register.phtml';
    }

    public function showError($error, $user) {
        echo "<h1>$error</h1>";
    }
}