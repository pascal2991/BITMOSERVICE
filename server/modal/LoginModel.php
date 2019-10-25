<?php
//include database Modal  
if(!require_once(dirname(__DIR__).'/core/BS_Model.php'))
{
    die('unable to include file');
}
//load error handler library file.
if(!require_once(dirname(__DIR__).'/library/BS_ErrorHandler.php'))
{
    die('unable to include file');
}

/**
 * Retrieve user information from database useing the where clause
 */
class LoginModel extends BS_Model
{
    /**
     * Get user data from database and return and object of data on success, false on failure.
     *
     * @param string $email
     * @return object|false
     */
    public function bs_loggedin_user_modal(string $email)
    {
        
        if(is_string($email) and !empty($email))
        {
            
            #get user information from db
            $user = $this->bs_db_where('register', ['user_email'=>$email]);
            #check if the user is an object of data gotten from database
            if(!is_null($user) and !is_bool($user) and is_object($user))
            {
                return $user;
            }
            else
            {
                #an anonnymouse error occourd
                return false;
            }
        }
        else
        {
            ##return null since parameter is empty
            
            return null;
        }
    }
   
}
