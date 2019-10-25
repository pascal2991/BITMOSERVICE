<?php
//require Errorhandler Library class file
if(!require_once(dirname(__DIR__).'/library/BS_ErrorHandler.php'))
{
    die('unable to include file');
}

class BS_Session  
{
    /**
     * Session config
     *
     * @var array
     */
    private $session_config = null;

    // /**constructor initializing session data */
    // public function __construct(array $sdata)
    // {
    //     //create session id
    //     $sid = session_create_id('CS-');
    //     //set session id
    //     session_id($sid);
    //     //start session 
    //     session_start();
    //     //initialize session data
    //     $this->session_config = $sdata;
    // }
    /**
     * Optionally initialize session data, this is helpful when extending class.
     *
     * @param array $sdata
     * @return bool
     */
    public function bs_session_ini(array $sdata)
    {
        
        if($this->bs_is_session_active())
        {
            // return false if session has already started
            return false;
        }
        else
        {
            //if the session has not yet been started, start session
            //create the session id
            $sid = session_create_id('CS-');
            //set session id
            session_id($sid);
            //start session 
            session_start();//initialize session variables
            $this->session_config = $sdata;
            //return true.
            return true;
        }
        
       
        
    }

    /**
     * Set/start the session after passing the session data during class instanciation.
     *
     * @return bool
     */
    public function bs_set_sessiondata()
    {
        //check if session config is not null
        if(!is_null($this->session_config) and is_array($this->session_config))
        {
            
            foreach ($this->session_config as $s_key => $s_value) {
                $_SESSION[$s_key] = $s_value;
            }
            return true;
        }
        
    }
    /**
     * Destory current session 
     *
     * @return bool
     */
    public function bs_session_destory()
    {
        
        $_SESSION = array();
        
        if(ini_get('session.use_cookies'))
        {
            $param = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $param['path'], $param['domain'], $param['secure'], $param['httponly']);

        }
        //destroy session
        session_destroy();

        return true;
    }
    /**
     * Destory user session individual or as an array of session keys by passing the session key(s).
     * \n
     * If mulitple keys is passed then there should be in an array e.g: $data = array('key1', 'key2'...'keyn');
     *
     * @param [type] $sdata
     * @return bool
     */
    public function bs_session_unset($sdata)
    {
        

        if(!empty($sdata) and !is_array($sdata))
        {
            
            
            //unset sdata             
            session_unset($sdata);
            
        }
        elseif(!empty($sdata) and is_array($sdata))
        {
            foreach ($sdata as $s_key ) {
                session_unset($s_key);
            }
            
        }

        //return true on success
        return true;
    }
    /**
     * Retrieve session data individually
     * Return the session value if it exist otherwise NUll
     * @param string $data
     * @return string
     */
    public function bs_get_sessiondata(string $data)
    {
        if(!empty($data) && isset($_SESSION[$data]))
        {
            return $_SESSION[$data];
        }
        else
        {
            return null;
        }
    }
    /**
     * Retrieve all session data as object e.g: $obj->property
     *
     * @param array $data
     * @return object
     */
    public function bs_get_session_all(array $data)
    {
        //initalize variable 
        $s_data = array();

        if(is_array($data) and !empty($data[0]))
        {
            //get num of element in arraty
            $len = count($data);
            
            foreach($data as $sdata){
                if(isset($_SESSION[$sdata]))
                {
                    //assign the keys to session data 
                    $s_data[$sdata] = $_SESSION[$sdata];
                }
            }
            
            
        }

        //check if the s_data has been updated
        if(isset($s_data))
        {
            //encode as json object
            $endcoded = json_encode($s_data);
            //decode the object
            $decoded = json_decode($endcoded);
            //return as array of php object class e.g: $a->b
            return $decoded;
        }
    }
    /**
     * check if session is active. Return true if session is active otherwise false.
     *
     * @return bool
     */
    public function bs_is_session_active()
    {
        $status = session_status();
        if($status === 1)
        {
            //there is no active session in the background
            return false;
        }
        elseif($status >= 2)
        {
            //there is an active session in the background
            return true;
        }
    }
   
}

