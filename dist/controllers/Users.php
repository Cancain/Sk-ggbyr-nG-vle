<?php require 'config/config.php'?>

<?php

function registerUser(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $emailErrMsg = '';
        $firstNameErrMsg = '';
        $lastNameErrMsg = '';
        $passWErrMsg = '';
        $confirmPassWErrMsg = '';
        $userNameErrMsg = '';
    
        //Set DSN
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $connection = new PDO($dsn, DB_USER, DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        $firstName = htmlspecialchars(trim($_POST['firstName']));
        $lastName = htmlspecialchars(trim($_POST['lastName']));
        $email = htmlspecialchars(trim($_POST['email']));
        $userName = htmlspecialchars(trim($_POST['userName']));
        $passW = htmlspecialchars(trim($_POST['passW']));
        $confirmPassW = htmlspecialchars(trim($_POST['confirmPassW']));  

        //Validate name
        if(empty($firstName)){
            $firstNameErrMsg = 'Du måste ange ett förnamn';
        }
        //Validate last name
        if(empty($lastName)){
            $lastNameErrMsg = 'Du måste ange ett efternamn';
        }
        //Validate username
        if(empty($userName)){
            $userNameErrMsg = 'Du måste ange ett användarnamn';
        }

        //Validate email
        if(empty($email)){
            $emailErrMsg = 'Du måste fylla i en email';
        }

        //Validate password
        if (empty($passW)){
            $passWErrMsg = 'Du måste ange ett lösenord';
        } else if (strlen($passW) < 6){
            $passWErrMsg = 'Ditt lösenord måste vara längre än 6 tecken';
        }

        //Validate Confirm password
        if(empty($confirmPassW)){
            $confirmPassWErrMsg = 'Du måste bekräfta ditt lösenord';
        } else if($passW != $confirmPassW){
            $confirmPassWErrMsg = 'Lösenorden matchar inte';
        }

        //Hash the password
        $passW = password_hash($passW, PASSWORD_DEFAULT);

        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'userName' => $userName,
            'email' => $email,
            'passW' => $passW,
            'firstNameErrMsg' => $firstNameErrMsg,
            'lastNameErrMsg' => $lastNameErrMsg,
            'userNameErrMsg' => $userNameErrMsg,
            'emailErrMsg' => $emailErrMsg,
            'passWErrMsg' => $passWErrMsg,
            'confirmPassWErrMsg' => $confirmPassWErrMsg
        ];

        //Check that all errors are empty
        if(empty($firstNameErrMsg) && empty($lastNameErrMsg) && empty($userNameErrMsg) && empty($emailErrMsg) && 
        empty($passWErrMsg) && empty($confirmPassWErrMsg)){
                //Add to database and redirect to login page
                

                $query = 'INSERT INTO users (userName, firstName, lastName, email, password)
                        VALUES (:userName, :firstName, :lastName, :email, :password)';
                $stmt = $connection->prepare($query);
                $stmt->execute(['userName' => $userName, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'password' => $passW]);
                die($data['passW']);
            } else {
                //Return to register page with the errors                
                return $data;
            }

    } else {
        $data = [
            'firstName' => '',
            'lastName' => '',
            'userName' => '',
            'email' => '',
            'passW' => '',
            'firstNameErrMsg' => '',
            'lastNameErrMsg' => '',
            'userNameErrMsg' => '',
            'emailErrMsg' => '',
            'passWErrMsg' => '',
            'confirmPassWErrMsg' => ''
        ];

        return $data;
    }
}

function logIn() {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Setting up DSN
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $connection = new PDO($dsn, DB_USER, DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $user = '';
        $password = '';
        $userErr = '';

        //Sanitize the post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $user = htmlspecialchars(trim($_POST['user']));
        $password = htmlspecialchars(trim($_POST['password'])); 

        //Validate username
        if(empty($user)){
            $userErr = 'Du har inte angett något användarnamn';
        }

        //Validate password
        if(empty($password)){
            $userErr = 'Du har inte angett något lösenord';
        }

        //Check for matching users and password
        $foundUser = findUserByUserName($user, $connection);

        if($foundUser){
            if(password_verify($password, $foundUser->password)){
                //check that all errors are empty
                if(empty($userErr)){
                    //make session var for logged in user
                    logInUser($foundUser);
                } else {
                    $userErr = 'Något gick fel, försök igen senare';
                }
                
            } else {
                //return to login with errors
                $userErr = 'Fel lösenord eller användare';
            }
        } else {
            //return to login with errors
            $userErr = 'Fel lösenord eller användare';
        }

        $data = [
            'user' => $user,
            'password' => $password,
            'userErr' => $userErr
        ];
    
        return $data;

    } else {
        $data = [
            'user' => '',
            'password' => '',
            'userErr' => ''
        ];
    
        return $data;
    }
}

function findUserByUserName($user, $connection){
    $query = 'SELECT * FROM users WHERE userName = :user';
    $stmt = $connection->prepare($query);
    $stmt->execute(['user' => $user]);
    $user = $stmt->fetch();
    return $user;
}

function logInUser($user){
    $_SESSION['userId'] = $user->id;
    $_SESSION['userName'] = $user->userName;
    $_SESSION['firstName'] = $user->firstName;
    $_SESSION['lastName'] = $user->lastName;
    $_SESSION['email'] = $user->email;
    $_SESSION['isAdmn'] = $user->isAdmin;
    $_SESSION['loggedIn'] = true;
}

function logOutUser(){
    session_unset();
    session_destroy();
}


