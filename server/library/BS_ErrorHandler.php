<?php


   
  set_err_handler();
     /**Error handler function */
    function err_handler($errno, $errstr, $errfile, $errline)
    {
        /**this error code is not included in error_reporting, so let it fall */
        if(!(error_reporting() & $errno))
        {
            #through to th estandard PHP error handler
            return false;
        }
        $style = function(){
            ?>
            <style type="text/css">
                .container{
                    margin: 4rem;
                    padding: 2rem;
                    box-shadow: 0 0 2rem;
                    color: linen;
                    background-color: orange;
                    border-radius: 2rem;
                }
                .error-h{
                    color: brown;
                    border-left: .2rem solid brown;
                    padding: 4px;
                    width: fit-content;
                    background-color: skyblue;
                }
                p{
                    font-size: x-large;
                    color: black;
                }
                .error-msg{
                    color: brown;;
                }
            </style>
            <?php
        };
        switch($errno)
        {
            case E_USER_ERROR:
                ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <title>PROGRAM ERROR: <?= $errno;?></title>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">

                        <?= $style();?>
                    </head>
                    <body>
                            <div class="container">
                                <h2 class="error-h"><b>PROGRAM ERROR</b> <?= $errno;?></h2>
                                <p><?= $errstr;?></p>
                                <p><b>Fatal Error</b> on line <?= $errline;?> in file <?= $errfile;?></p>
                            </div>
                            <!-- LOGGING ERROR -->
                            <?php log_error_to_file($errno, $errstr, $errfile, $errline, 'E_USER_ERROR'); ?>
                            <?php exit(1); ?>
                    </body>
                </html>
                <?php
                break;
            case E_USER_WARNING:
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <title>WARNING: <?= $errno;?></title>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <?= $style();?>
                        </head>
                        <body>
                            <div class="container">
                            <h2 class="error-h"><b>WARNING <?= $errno;?></b></h2>
                            <p><b>ERROR </b> <?= $errno;?> <span class="error-msg"><?= $errstr; ?></span></p>
                            <!-- LOGGING ERROR -->
                            <?php log_error_to_file($errno, $errstr, $errfile, $errline, 'E_USER_WARNING'); ?>
                            </div>
                            <?php exit(1);?>
                        </body>
                    </html>
                <?php
                break;
            case E_USER_NOTICE:
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <title>NOTICE <?= $errno;?></title>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <?= $style();?>
                        </head>
                        <body>
                            <div class="container">
                                <h2 class="error-h"><b>NOTICE <?= $errno;?></b></h2>
                                <p><b>ERROR </b> <?= $errno; ?> <span class="error-msg"><?= $errstr; ?></span></p>
                                <!-- LOGGING ERROR -->
                                <?php log_error_to_file($errno, $errstr, $errfile, $errline, 'E_USER_NOTICE'); ?>
                            </div>
                            <?php exit(1);?>
                        </body>
                    </html>
                <?php
                break;
            default:
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <title>UNKNOWN ERROR</title>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <?= $style();?>
                        </head>
                        <body>
                            <div class="container">
                                <h2 class="error-h"><b>UNKNOWN <?= $errno;?></b></h2>
                                <p><b>ERROR</b> <?= $errno; ?> <span class="error-msg"><?= $errstr; ?></span></p>
                                <!-- LOGGING ERROR -->
                                <?php log_error_to_file($errno, $errstr, $errfile, $errline, 'UNCOUGHT ERROR'); ?>
                            </div>
                            <?php exit(1);?>
                        </body>
                    </html>
                <?php
                break;
        }
        /* Don't execute PHP internal error handler */
        return true;
    }

    /**set user error handler */
    function set_err_handler()
    {
        set_error_handler('err_handler');
    }



    /**error logging to error.log file */
    function log_error_to_file($errno, $errstr, $errfile, $errline, $errtype)
    {
        if(!is_null($errno) and !is_null($errstr) and !is_null($errfile) and !is_null($errline) and !is_null($errtype))
        {
            $filename = 'errors.log';
            $time = date('l jS F, Y -|- h:i:s A');

            $log_content = json_encode(array('datetime'=>$time, 'errortype'=>$errtype, 'errorno'=>$errno, 'errormsg'=>$errstr, 'errorline'=>$errline, 'errorfile'=>$errfile));
            #write to log file
            if(file_put_contents($filename, $log_content."\n", FILE_APPEND | LOCK_EX))
            {
                return;
            }
        }
        return;
    }

