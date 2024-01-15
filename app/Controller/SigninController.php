<?php

namespace App\Controller;

use App\Model\SigninModel;

class SigninController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $signinModel = new SigninModel();

            $user = $signinModel->authenticateUser($email, $password);

            if ($user) {
                session_start();

                // Store user information in session variables
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'admin') {
                    header("Location: ./dashboard");
                } else {
                    header("Location: ./home");
                }

                exit();
            } else {
                header("Location: ./signin?error=1");
                exit();
            }
        } else {
            // If the form is not submitted, include the sign-in view
            include("../app/View/Signin.php");
        }
    }
}