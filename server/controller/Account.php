<?php
//require data model class
if(!require_once(dirname(__DIR__).'/modal/Account_Model.php'))
{
    die('unable to include file');
}
/**
 * Create a client account
 */
class Account extends Account_Model 
{
   
    public function get_form_data($fdata)
    {
        //data to send to model
        $data = array();
        //var to extract data to
        $u = $e = $pswd =  null;

        //check if $fdata is obj
        if(!is_object($fdata))
        {
            //if not obj 
            return false;
        }
        else
        {
            /**Retrieve form data */
            $u = $fdata->username;
            $e = $fdata->email;
            
            //check if password matches
            $p = $this->psword_confirmer($fdata->password, $fdata->password_repeat);
            if($p === true)
            {
                if($this->psword_hasher($fdata->password) !== false)
                {
                    $pswd = $this->psword_hasher($fdata->password);
                }
            }
            else
            {
                //if password didn't  matches return the error that occourd.
                return ($p);
            }
            
        }

        /**send data to data model for insertion*/
        if(!is_null($u) && !is_null($e) && !is_null($pswd))
        {
            $data = array('username'=>$u, 'email'=>$e, 'password'=>$pswd);
            $is_data_inserted = parent::bs_client_signup($data);
            
            //check if data is inserted 
            if($is_data_inserted === true)
            {
                return true;
            }
            else
            {
                return $is_data_inserted;
            }
        }



    }
    /**
     * Hash passowrd and return it
     *
     * @param string $pswrd
     * @return $pswrd|false
     */
    public function psword_hasher(string $pswrd)
    {
        if(!empty($pswrd))
        {
            $ps_hashed = password_hash($pswrd, PASSWORD_DEFAULT);
            return $ps_hashed;
        }
        else {
            return false;
        }
    }
    /**
     * compare password and return true on success error on failure
     *
     * @param string $pswrd
     * @param string $con_pswrd
     * @return mixed
     */
    public function psword_confirmer(string $pswrd, string $con_pswrd)
    {
        //pswrd is not empty
        if(!empty($pswrd) && !empty($con_pswrd))
        {
            $ps_len = count($pswrd);
            $c_ps_len = count($con_pswrd);
            if($ps_len === $c_ps_len && $pswrd === $con_pswrd)
            {
                //return bool
                return true;
            }
            else
            {
                //return a js obj with an error msg 
                return (json_encode(array('error'=>'Passowrd didn\'t match.')));
            }
        }
        else
        {
            //pswrd is empty 
            return (json_encode(array('error'=>'Password is Requied!')));
        }
    }
}
