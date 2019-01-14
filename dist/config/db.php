<?php require 'config.php'?>

<?php




function getPortfolio(){
    //Set DSN
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    //Create a PDO instance  
    $connection = new PDO($dsn, DB_USER, DB_PASSWORD);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = 'SELECT * FROM portfolio ORDER BY id DESC';
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll();
    return $posts;
}

function registerUser(){

    $msg = '';
    $emailErrMsg = '';
    $firstNameErrMsg = '';
    $lastNameErrMsg = '';
    $passWErrMsg = '';
    $confirmPassWErrMsg = '';

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

    //Validate email
    if(empty($email)){
        $emailErrMsg = 'Email kan inte vara tomt';
    } else {
        //check for duplicate email
    }
    //Validate first name
    if(empty($firstName)){
        $firstNameErrMsg = 'Förnamn kan inte var tomt';
    }
    //Validate last name
    if(empty($lastName)){
        $lastNameErrMsg = 'Efternamn kan inte vara tomt';
    }
    //Validate password
    if(empty($passW)){
        $passWErrMsg = 'Lösenordet kan inte vara tomt';
    }
    //Validate confirm password
    if(empty($confirmPassW)){
        $confirmPassWErrMsg = 'Du måste bekräfta ditt lösenord';
    }

    //Check that errors are empty
    if(!empty($emailErrMsg) && !empty($firstNameErrMsg) && !empty($lastNameErrMsg) && 
    !empty($passWErrMsg) && !empty($confirmPassWErrMsg)){
        //register user

        //Set up the query
        $query = 'INSERT INTO USERS (firstName, lastName, email, userName, passW) 
        VALUES (:firstName, :lastName, :email, :userName, :passW)';

        $stmt = 


    }


    echo $msg;
    echo $emailErrMsg;
    echo $firstNameErrMsg;
    echo $lastNameErrMsg;
    echo $passWErrMsg;
    echo $confirmPassWErrMsg;
    
}
?>


