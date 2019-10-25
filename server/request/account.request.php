<?php

/**
 * @author Obi Pascal B <pascalobi83@gmail.com>
 * This file is responsible for any request that comes from an ajax request
 */

/**require Account class */

if(!require_once(dirname(__DIR__).'/controller/Account.php'))
{
    die('unable to include file');
}
/**initializing Account Class */
$account = new Account;

/**require Helper class */

if(!require_once(dirname(__DIR__).'/helpers/Form_Helper.php'))
{
    die('unable to include file');
}
/**initializing Account Class */
$form_helper = new Form_Helper;

/**form input field  data for registeration*/
$data = array(
    'username'=>array(
        'filter'=>FILTER_SANITIZE_STRING
    ),
    'email'=>array(
        'filter'=>FILTER_VALIDATE_EMAIL
    ),
    'password'=>array(
        'filter'=>FILTER_SANITIZE_STRING
    ),
    'password_repeat'=>array(
        'filter'=>FILTER_SANITIZE_STRING
    ),
    
);
//validate and sanitize form data
$fdata = $form_helper->bs_multi_input_post($data);
//pass fdata to account class for insertion
$is_data_insert = $account->get_form_data($fdata);
//check if data was inserted successfuly
if($is_data_insert === true)
{
    //echo success msg
    echo json_encode(array('success'=>'Registeration Was Successful!'));
}
else
{
    //echo what when wrong
    echo $is_data_insert;
}




