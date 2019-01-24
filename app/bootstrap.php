<?php

//load helpers
require_once 'helpers/urlHelpers.php';
require_once 'helpers/sessionHelpers.php';

//Load config
require_once 'config/config.php';

//Load libraries
// require_once 'libraries/Controller.php';
// require_once 'libraries/Core.php';
// require_once 'libraries/Database.php';

//Autoload core libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});

?>

