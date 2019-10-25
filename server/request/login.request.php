<?php
/**require Helper class */

if(!require_once(dirname(__DIR__).'/helpers/Form_Helper.php'))
{
    die('unable to include file');
}
/**initializing Account Class */
$form_helper = new Form_Helper;
/**require Helper class */

if(!require_once(dirname(__DIR__).'/controller/LoginUser.php'))
{
    die('unable to include file');
}
/**initializing Account Class */
$logUser = new LoginUser;

/**form input field  data for registeration*/
$data = array(
   
    'email'=>array(
        'filter'=>FILTER_VALIDATE_EMAIL
    ),
    'password'=>array(
        'filter'=>FILTER_SANITIZE_STRING
    )
    
);
//validate and sanitize form data
$fdata = $form_helper->bs_multi_input_post($data);

$data = array('email'=>$fdata->email, 'password'=>$fdata->password);
#call login user fun
$loggedin = $logUser->bs_loggedin_user($data);

if($loggedin !== false)
{
    echo $loggedin;
}