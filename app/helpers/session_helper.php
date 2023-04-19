<?php
    session_start();
    // Flash message
    function flash($name = '', $msg = '',$class = 'allert')
    {
        if(!empty($name))
        {
            if(!empty($msg) && empty($_SESSION[$name]) )
            {
                $_SESSION[$name] = $msg;
                $_SESSION[$name . '_class'] = $class;
            }
            elseif( empty($msg) && !empty($_SESSION[$name]))
            {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo '<div class ="' . $class . '"id = "msg-flash"><p>' . $_SESSION[$name] . '</p></div>';  
                unset($_SESSION[$name . '_class']);
                unset($_SESSION[$name]);
            }
        }
    }

function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }
    else{
        return false;
    }
}
function isSelleerLoggedIn(){
    if(isset($_SESSION['user_id'])){
        return true;
    }
    else{
        return false;
    }
}

function isAdvisorLogin(){
    
    if(isset($_SESSION['advisor_id'])){
        return true;
    }
    else{
        return false;
    }


}