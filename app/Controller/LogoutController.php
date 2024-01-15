<?php
namespace App\Controller;

class LogoutController{
    public function logout()
    {
        session_unset(); // Désactive toutes les variables de session
        session_destroy(); // Détruit la session
        header("Location:" .URL_DIR."Signin");
        exit();
    }
}
