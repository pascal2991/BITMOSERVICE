<?php
//include database Modal  
if(!require_once(dirname(__DIR__).'/modal/LoginModel.php'))
{
    die('unable to include file');
}
//load error handler library file.
if(!require_once(dirname(__DIR__).'/library/BS_ErrorHandler.php'))
{
    die('unable to include file');
}

/**
 * Login Client to dashboard
 * @Algorithm
 * 1=>Retrieve user record 
 * 2=>Check if user exist and credential matches.
 * 3=> if user exist and credentials matches logged user in to dashboard
 * 4=> Else return error
 */
class LoginUser extends LoginModel
{
    /**
     * Logged client in and start session on success. false on failure.
     *
     * @param array $darray
     * @return void
     */
    public function bs_loggedin_user(array $darray)
    {
        #initialize variable
        $em = $pswrd = null;
        #get the email address
        if(isset($darray) and array_key_exists('email', $darray))
        {
            $em = $darray['email'];
        }
        #get the password enter from client
        if(isset($darray) and array_key_exists('password', $darray))
        {
            $pswrd = $darray['password'];
        }
        
        #check if variablse where initialize
        if(!is_null($em) and !is_null($pswrd))
        {
            
            #get user information from db
            $user = $this->bs_loggedin_user_modal((string) $em);
            
            #check if the user is an object of data gotten from database
            if(!is_null($user) and !is_bool($user) and is_object($user))
            {
                #convert data return to string 
                (string) $pswrd_hsd = $user->user_psword;
                $password_verified = $this->bs_verify_client_psword($pswrd_hsd, $pswrd);
                #check if password was verified anyway's
                if(is_bool($password_verified) and $password_verified === true)
                {
                    //password was verified
                    #start user session immidiately
                    $session_data = array(
                        'bs_client_email' => $user->user_email,
                        'bs_client_loggedin'=>true
                    );
                    if(isset($_SESSION['loggedin']) and $this->bs_get_sessiondata('bs_client_loggedin') === true)
                    {
                        //redirect client
                        header('Location: '.$_SERVER['HTTP_HOST'].'/bitmoservice/');
                    }
                    else
                    {
                        if($this->bs_session_ini($session_data) === true)
                        {
                           //start session 
                           $this->bs_set_sessiondata();
                            
                            return json_encode(['success'=>'Loggedin Successfully!']);
                        }
                        else
                        {
                            # return false. No session was started
                            return false;
                        }
                    }
                }
                else
                {
                    #report user error 
                    return json_encode(['error'=>'<span class="text-danger">Invalide Password Entered!</span>']);
                }
            }
        }
    }
    public function bs_verify_client_psword(string $hashed, string $psword)
    {
        #check if variables are ever empty at all.
        if(!empty($hashed) and !empty($psword))
        {
            #variables are not empty
            
            #verify password and return true alse false
            if(password_verify($psword, $hashed))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            trigger_error('Variables required', E_USER_WARNING);
        }
    }
    
}
