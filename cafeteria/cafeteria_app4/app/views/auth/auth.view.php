<?php

class AuthView {

    public function showLogin() {
        require_once 'app/templates/form.login.phtml';
    }

    public function showError($error, $user) {
        echo "<h1>$error</h1>";
    }
}