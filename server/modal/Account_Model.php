<?php

if(!require_once(dirname(__DIR__).'/core/BS_Model.php'))
{
    die('unable to include file');
}

/**
 * Account Class
 * @method mixed bs_client_signup()
 * @method mixed bs_client_login()
 * 
 */
class Account_Model extends BS_Model
{
    /**
     * bs_confirm_mail
     *
     * @param string $email_addr
     * @return bool
     */
    public function bs_confirm_mail(string $email_addr)
    {
        /**construct email confirmation link */
        $session_time = date(DATE_RFC2822);
        $session = base64_encode($session_time);
        $confirm_link = '<a href="http://www.bitmoservice.com/auth/confirm_mail.php?uregistered=true&uemail='.$email_addr.'&usession='.$session.'">Confirm Email Registeration!</a>';

        /**compose email confirmation */
        $to = $email_addr;
        $subject = 'BitmoService Email Confirmation';
        $msg = $confirm_link;
        //headers
        $header = 'From:pascalobi83@gmail.com\r\n';
        $header .= 'MIME-Version: 1.0\r\n';
        $header .= 'Content-type:text/html;charset=UTF-8\r\n';
        //mail
        $is_mail_send = mail($to, $subject, $msg, $header);
        if($is_mail_send == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /**
     * bs_client_signup
     * @desc This function takes an array as argument
     * @param array $form_post_data
     */
    public function bs_client_signup(array $form_post_data)
    {
        //validate form_dat
        if(is_array($form_post_data))
        {
            //if it's an array processed data collection
            $username = $email_addr = $psword = null;
            $confirm_session_dt = base64_encode(date(DATE_RFC2822));
            //username
            if(array_key_exists('username', $form_post_data))
            {
                $username = $form_post_data['username'];
            }

            //email_addr
            if(array_key_exists('email', $form_post_data))
            {
                $email_addr = $form_post_data['email'];
                
            }

            //psword
            if(array_key_exists('password', $form_post_data))
            {
                $psword = $form_post_data['password'];
            }
            
            /**
             * at this state we call the insert function from parent class Database
             */
            #check if vars are empty
            if(!is_null($username) and !is_null($email_addr) and !is_null($psword))
            {
                #check if a user exist with the same email address
                $user = $this->bs_db_where('register',['user_email'=> $email_addr]);
                if(!is_null($user) and is_object($user))
                {
             
                    if($email_addr === $user->user_email)
                    {
                        return json_encode(['error'=>'<span class="text-danger">There is a user with This email {<mark>'.$email_addr.'</mark>} .</sapn>']);
                    }
                }
                else
                {
                    $data = array(
                        'table'=>'register',
                        'column'=>array('user_username', 'user_email', 'user_psword', 'confirm_session_dt'),
                        'values'=>[$username, $email_addr, $psword, $confirm_session_dt]
                    );
                    
                    //insert data into db
                    $data_iserted = $this->bs_db_insertdata($data);
                   
                    if($data_iserted !== true)
                    {
                        return false;
                    }
                    else
                    {
                        //send confirmation email
                        $this->bs_confirm_mail($email_addr);
                        //return true;
                        return true;
                    }
                }
               
            }
            else
            {
                return false;
            }
            

        }
        else
        {
            //if @param $form_post_data is not an array return false 
            return false;
        }
    }

    
}
