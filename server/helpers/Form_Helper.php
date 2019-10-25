<?php
/**
 * Data validation Helper Class
 *
 */
class Form_Helper
{
    /**
     * This function remove all HTML Tags from a string and return string on success, Null if string is not provided
     *
     * @param string $str
     * @return $str|Null
     */
    public function bs_string_filter(string $str)
    {
        if (!empty($str)) {
            $s = filter_var($str, FILTER_SANITIZE_STRING);
            return $s;
        } else {
            //return Null
            return null;
        }
    }

    /**
     * This function check if a variable is an integer and return true. if the variable is not an
     * integer it return false.
     *
     * @param mixed $integer
     * @return bool
     */
    public function bs_is_int_valid($integer)
    {
        if (!empty($integer)) {
            if (!filter_var($integer, FILTER_VALIDATE_INT) === false) {
                //return true
                return true;
            } else {
                //return false
                return false;

            }
        } else {
            //return null
            return null;
        }
    }

    /**
     * This function check if the external variable is sent to a php page, through a "GET" method,
     * and alos sanitized the variable and return it on success, Null on failure.
     *
     * @param [type] $input
     * @return $input|NULL
     */
    public function bs_input_get($input)
    {
        if (!empty($input)) {
            if (!filter_input(INPUT_GET, $input, FILTER_SANITIZE_STRING)) {
                return null;
            } else {
                $i = filter_input(INPUT_GET, $input, FILTER_SANITIZE_STRING);
                return $i;
            }
        } else {
            // return Null
            return null;
        }
    }
    /**
     * This function check if the external variable is sent to a php page, through a "POST" method,
     * and alos sanitized the variable and return it on success, Null on failure.
     *
     * @param [type] $input
     * @return $input|NULL
     */
    public function bs_input_post($input)
    {
        if (!empty($input)) {
            if (!filter_input(INPUT_POST, $input, FILTER_SANITIZE_STRING)) {
                return null;
            } else {
                $i = filter_input(INPUT_POST, $input, FILTER_SANITIZE_STRING);
                return $i;
            }
        } else {
            // return Null
            return null;
        }
    }
    /**
     * This function check if the external variable is sent to a php page, through a "POST" method,
     * and alos sanitized the variable and return it on success, Null on failure.
     *
     * @param [type] $input
     * @return $input|NULL
     */
    public function bs_input_request($input)
    {
        if (!empty($input)) {
            //If not post method
            if (!filter_input(INPUT_POST, $input, FILTER_SANITIZE_STRING)) {
                //check if it's get method
                if (!filter_input(INPUT_GET, $input, FILTER_SANITIZE_STRING)) {
                    return null;
                } else {
                    $i = filter_input(INPUT_GET, $input, FILTER_SANITIZE_STRING);
                    return $i;
                }
            } else {
                $i = filter_input(INPUT_POST, $input, FILTER_SANITIZE_STRING);
                return $i;
            }
        } else {
            // return Null
            return null;
        }
    }
    /**
     * Multiple input validation on get method. The values of the input can be retrieve just like the way you call
     * a method of a class e.g: $obj->method_name. in this case we will retrieve the input value like this
     * example:
     * $data = array(
     * 'first_name'=> array(
     *      'filter'=>FILTER_SANITIZED_STRING
     *  )
     * );
     * @$data:
     * first_name = this is the input field name e.g: <input type="text" name="first_name">
     * filter = this is how you want php to sanitized the variable.
     * $data_obj = $instanceofhelper->bs_multi_input_get($data)
     * #retrieving data 
     * $data_obj->first_name #output: will be the value entered in the form input
     *
     * @param array $input
     * @return object
     */
    public function bs_multi_input_get(array $input)
    {
        if(!filter_input_array(INPUT_GET, $input))
        {
            return null;
        }
        else
        {
            $input_obj = json_encode(filter_input_array(INPUT_GET, $input));
            return json_decode($input_obj);
        }
    }
    /**
     * Multiple input validation on get method. The values of the input can be retrieve just like the way you call
     * a method of a class e.g: $obj->method_name. in this case we will retrieve the input value like this
     * example:
     * $data = array(
     * 'first_name'=> array(
     *      'filter'=>FILTER_SANITIZED_STRING
     *  )
     * );
     * @$data:
     * first_name = this is the input field name e.g: <input type="text" name="first_name">
     * filter = this is how you want php to sanitized the variable.
     * $data_obj = $instanceofhelper->bs_multi_input_get($data)
     * #retrieving data 
     * $data_obj->first_name #output: will be the value entered in the form input
     *
     * @param array $input
     * @return object
     */
    public function bs_multi_input_post(array $input)
    {
        if(!filter_input_array(INPUT_POST, $input))
        {
            return null;
        }
        else
        {
            $input_obj = json_encode(filter_input_array(INPUT_POST, $input));
            return json_decode($input_obj);
        }
    }
}

// $h = new Helper;
// $data = array(
//     'fname'=>array(
//         'filter'=>FILTER_SANITIZE_STRING
//     ),
//     'lname'=>array(
//         'filter'=>FILTER_SANITIZE_STRING
//     )
// );
// $obj = $h->bs_multi_input_post($data);
// if(is_object($obj))
// {
//     echo $obj->fname;
//     echo $obj->lname;
// }
function template()
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Test post </title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="bss/style.bss" rel="stylesheet">
        </head>
        <body>
        <form action="?" method="post">
            <input type="text" name="fname" id="name">
            <input type="text" name="lname" id="name">
            <input type="submit" value="Submit">
        </form>
        </body>
    </html>
    <?php
}


