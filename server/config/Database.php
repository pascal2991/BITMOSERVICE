<?php

//require Session Library class file
if(!require_once(dirname(__DIR__).'/library/BS_Session.php'))
{
    die('unable to include file');
}

/**
 * Database Configuration and connection 
 * 
 */
class Database extends BS_Session
{
    /**database connection configuration*/
    private $config = array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'bitmoservice_demo'
    );

    /**connection function */
    public function bs_db_connect()
    {
        //initialize variables
        $h = $u = $p = $d = null;

        //fatch configuration file
        foreach ($this->config as $key => $valuesue) {
            if($key === 'host')
            {
                $h = $valuesue;
            }
            elseif($key === 'user')
            {
                $u = $valuesue;
            }
            elseif($key === 'password')
            {
                $p = $valuesue;
            }
            elseif($key === 'database')
            {
                $d = $valuesue;
            }
            else
            {
                $h = $u = $p = $d = null;
            }
        }

        //check if variable are null or empty
        if(!is_null($h) && !is_null($u) && !is_null($p) && !is_null($d))
        {
            //try to connection database 
            try {
                //connect
                $connect = mysqli_connect($h, $u, $p, $d);
                if($connect !== false)
                {
                    return ($connect);
                }
                else
                {
                    throw new Exception("Error Processing Database connection");
                    exit(1);
                }
            } catch (Exception $e) {
                echo json_encode('Error: '.$e->getMessage().'<br> Trace: '.$e->getTraceAsString());
            }
        }


    }
    /**set Configuartion  */
    public function bs_db_config(array $config_data)
    {
        if(is_array($config_data))
        {
            //set db config and return boolean
            $this->config = $config_data;
            return true;
        }
        else
        {
            //return false 
            return false;
        }
    }
    
  
}

