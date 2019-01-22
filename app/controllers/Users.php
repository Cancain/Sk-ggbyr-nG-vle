<?php

class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Get all data from POST and put into data array
            $data = [
                'userName' => $_POST['user'],
                'password' => $_POST['password'],
                'userErr' => ''
            ];

            //Validate user input
            if(empty($data['userName'])){
                $data['userErr'] = 'Du måste ange ett användarnamn';
            }

            //Validate password input
            if(empty($data['password'])){
                $data['userErr'] = 'Du måste ange ett lösenod';
            }

            //if the errors are empty
            if(empty($data['userErr'])){
                //get user from database
                $loggedInUser = $this->userModel->getUserFromUserName($data['userName']);

                if($loggedInUser){
                    //check if passwords match
                } else {
                    $data['userErr'] = 'Fel lösenord eller användarnamn';
                }
            } else {
                //return to login page with errors
                $this->view('users/login', $data);
            }

        } else {
            //load the login page
            $this->view('users/login', $data);
        }
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Get all data from POST and add to an array
            $data = [
                'firstName' => htmlspecialchars(trim($_POST['firstName'])),
                'lastName' => htmlspecialchars(trim($_POST['lastName'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'userName' => htmlspecialchars(trim($_POST['userName'])),
                'password' => htmlspecialchars(trim($_POST['password'])),
                'confirmPassword' => htmlspecialchars(trim($_POST['confirmPassword'])),
                'firstNameErr' => '',
                'lastNameErr' => '',
                'emailErr' => '',
                'userNameErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => ''
            ];
            
            //Validate first name
            if(empty($data['firstName'])){
                $data['firstNameErr'] = 'Du måste ange ett förnamn';
            } 

            //Validate last name
            if(empty($data['lastName'])){
                $data['lastNameErr'] = 'Du måste ange ett efternamn';
            }

            //Validate email
            if(empty($data['email'])){
                $data['emailErr'] = 'Du måste ange en korrekt emailadress';
            }
            //Validate username
            if(empty($data['userName'])){
                $data['userNameErr'] = 'Du måste ange ett användarnamn';
            }
            //Validate password
            if(empty($data['password'])){
                $data['passwordErr'] = 'Du måste ange ettt lösenord';
            } elseif (strlen($data['password']) < 6) {
                //if the password has less then 6 characters
                $data['passwordErr'] = 'Ditt lösenord måste vara åtminstone 6 tecken';
            }
            //Validate confirm password
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordErr'] = 'Du måste bekräfta ditt lösenord';
            } elseif($data['password'] != $data['confirmPassword']){
                //if password and confirm password does not match
                $data['confirmPasswordErr'] = 'The passwords does not match';
            }

            //make sure all errormessages are empty
            if(empty($data['firstNameErr']) && empty($data['lastNameErr']) && empty($data['emailErr']) && empty($data['userNameErr']) &&
            empty($data['passwordErr']) && empty($data['confirmPasswordErr'])){
                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //add user to database
                if($this->userModel->registerUser($data)){
                    //redirect to index
                    redirect('users/login');
                } else {
                    die('Något gick fel, försök igen senare');
                }                
            } else {
                //return to the register page with errors
                $this->view('users/register', $data);
            }           

        } else {
            $data = [
                'firstName' => '',
                'lastName' => '',
                'email' => '',
                'userName' => '',
                'password' => '',
                'confirmPassword' => '',
                'firstNameErr' => '',
                'lastNameErr' => '',
                'emailErr' => '',
                'userNameErr' => '',
                'passwordErr' => '',
                'confirmPasswordErr' => ''
            ];

            $this->view('users/register', $data);
        }
    }
}