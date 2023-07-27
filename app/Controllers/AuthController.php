<?php

namespace app\Controllers;

use app\Services\MainView;

use app\Models\Auth;

/**
 * Authentication controller class which controls user authentication methods.
 * Extends the Authentication (Auth) model, and is made up of the methods signIn, signUp, as well as storeSignIn and storeSignUp using posted data.
 * 
 * Class AuthController
 * @package app\Controllers
 */

class AuthController extends Auth
{
    /**
     * Sign in method calls the view renderer to render the sign in view page.
     * 
     * Method signIn.
     * @return void
     */
    public function signIn(): void
    {
        MainView::renderAuth('sign-in', []);
    }

    /**
     * Sign up method calls the view renderer to render the sign up view page.
     * 
     * Method signUp.
     * @return void
     */
    public function signUp(): void
    {
        MainView::renderAuth('sign-up', []);
    }

    /**
     * Store sign up method calls static register method in Auth model class if 'sign-up' is set in $_POST array, passing along user data set in $_POST array from form provided in sign up view.
     * 
     * Method storeSignUp.
     * @return void
     */
    public function storeSignUp(): void
    {
        if (isset($_POST['sign-up'])) {
            Auth::register($_POST['name'], $_POST['email'], $_POST['password'], $_POST['about'], $_FILES['image']);
        }
    }

    /**
     * Store sign in method calls static login method in Auth model class if 'sign-in' is set in $_POST array, passing along user data set in $_POST array from form provided in sign in view. 
     * 
     * Method storeSignIn.
     * @return void
     */
    public function storeSignIn(): void
    {
        if (isset($_POST['sign-in'])) {
            Auth::login($_POST['email'], $_POST['password']);
        }
    }
}
