<?php
session_start();

/*Flash message helper
 *Example: flash('registerSuccess', 'You are now registered');
 *         flash(NAME, MESSAGE);
 * To display in view: echo flash('registerSuccess');
 *                     echo flash('NAME');
 */
function flash($name = '', $message = '', $class = 'flashSuccess'){
    if(!empty($name)){          
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            
            if(!empty($_SESSION[$name . '_class'])){
                unset($_SESSION[$name . '_class']);
            }
            
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;            
        } elseif (empty($message) && !empty($_SESSION[$name])) {            
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<span class="'.$class.'" id=msgFlash">'.$_SESSION[$name].'</span>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}