<?php

//require Database class file
if(!require_once(dirname(__DIR__).'/config/Database.php'))
{
    die('unable to include file');
}

class BS_Model extends Database 
{
      /**
     * Insert data into database and return true on success. Note: if column name or table is spelled wrongly this 
     * might break the software flow which will require you to trace the error. The outcome might be a false return 
     * by the function. This function array is use to build SQL Query by specifying the $data = array(Table_name=>name_of_table, 
     * Column=>array(col1, col2, col3,...coln), values=>array(val1, val2, val3,... valn));
     *
     * @param array $data
     * @return bool
     */
    public function bs_db_insertdata(array $data)
    {
        //check to see if the array is not empty
        if(isset($data))
        {          
                
            //if data is set initialize variablse
            $table = $columns = $values = null;

            //retrieve variable by checking if their key's exist

            //initialize table variable
            if(array_key_exists('table', $data))
            {
                
                $table = $data['table'];
            }
            //initialize colum variable
            if(array_key_exists('column', $data))
            {
                $cl = $data['column'];
                if(is_array($cl) and isset($cl))
                {
                    $columns = implode(', ', $cl);
                }
            }
            //initialize Values variable
            if(array_key_exists('values', $data))
            {
                $vl = $data['values'];
                if(is_array($vl) and isset($vl))
                {
                    $qv = $this->bs_db_add_quotes($vl);
                    if(!empty($qv) and !is_null($vl))
                    {
                        $values = implode(', ', $qv);
                    }
                    else
                    {
                        return json_encode(['error'=>'An error occourd while adding quotes to variable']);
                        exit(1);
                    }
                }
            }
            //get database connection status
            $dblink = $this->bs_db_connect();
            //check if variables are not null
            if(!empty($table) && !empty($columns) && !empty($values))
            {                
                //build database query 
                $sql = "INSERT INTO $table ($columns) VALUES ($values)";                
                
                //check database connection status
                if($dblink !== FALSE)
                {                   
                    //execute query
                    if(mysqli_query($dblink, $sql))
                    {                       
                        //return true if query was successfully executed
                        return true;
                    }
                    else
                    {                        
                        //return false on failure
                        return false;
                    }
                }
                else
                {
                    return json_encode(['error'=>'<span class"text-danger">There was an error in database connection #'.mysqli_errno($dblink).'</span>']);
                }
            }
            
            
        }
        else
        {
            //return false if data is not set
            return false;
        }

        
    }
    /**
     * Add single quotes to a string and return it as an array. This funciton return null if argument is int or empty.
     * If array is provided the array values will be quoted and return as an array.
     * 
     *
     * @param [type] $data
     * @return array|null
     */
    public function bs_db_add_quotes($data)
    {
        //create variable 
        $strings = [];
        if(is_array($data) and isset($data))
        {
            //add quote to string and push to string variable
            foreach ($data as $key ) {
                array_push($strings, "'".$key."'");
            }
        }
        elseif(is_string($data) and !empty($data))
        {
            return ("'".$data."'");
        }
        elseif(is_int($data))
        {
            //return null
            return null;
        }
        else
        {
            //return null
            return null;
        }

        //return $strings
        if(isset($strings))
        {
            return $strings;
        }
        else
        {
            return null;
        }
    }
    /**
     * Get data from database useing the where statement e.g array('column'=>'value')
     *
     * @param string $table
     * @param array $array
     * @return null|false|object
     */
    public function bs_db_where(string $table, array $array)
    {
        #variable initialization
        $db_table = $column = $term = null;

        #extract the table variable by checking it's not empty
        if(!empty($table) and is_string($table))
        {
            $db_table = $table;
        }

        #extract the column which we are going to search the term on
        if(isset($array))
        {
            $key = array_keys($array);
            $column = implode('', $key);
        }
        
        ##extract the term to search the column
        if(array_key_exists($column, $array) and !empty($array[$column]) and is_string($array[$column]))
        {
            $term = $this->bs_db_add_quotes($array[$column]);
        }
        
        #validate that all variable are not empty before in database query
        if(!is_null($db_table) and !is_null($column) and !is_null($term))
        {
            //all variable are set to go 
           
            #create a database connection 
            $db = ($this->bs_db_connect() !== false) ? $this->bs_db_connect() : null;
            #build the db query asbtractly
            $sql = ("SELECT * FROM $db_table WHERE $column=$term");
           
            ##test to see if connection is true
            if(!is_null($db))
            {
                
                //connection to database is oneway Oops! Good to Go
                #query database
                if($result = mysqli_query($db, $sql))
                {
                  
                    #check to see if data was return 
                    if(mysqli_num_rows($result) > 0)
                    {
                        #there was some data return from the query after all, let's go ahead and do something with the data. shall we!
                        #loop through all data 
                        while($data = mysqli_fetch_assoc($result))
                        {
                            #return the data as object like column->value
                            return json_decode(json_encode($data));
                        }
                    }
                    else
                    {
                        #since there no data in the database that maches we return null as empty 
                        return null;
                    }
                }
                else
                {
                    #since there was no query executed we return false 
                    return false;
                }
            }
            else
            {
                #since there was know database connection let's return null
                return null;
            }
        }
        else
        {
            return json_encode(['error'=>'argurment are required']);
        }
    }
}
