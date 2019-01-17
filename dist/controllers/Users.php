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


