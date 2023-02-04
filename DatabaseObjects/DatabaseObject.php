<?php
require "Database.php";

abstract class DatabaseObject{

    function search()
    {
        // if PK for object not set then don't find object

        $objectVars = get_object_vars($this);
        $arrayKeys = array_keys($objectVars);

        if($objectVars[$arrayKeys[0]] === null)
        {
            return;
        }
        $Database = new Database();
        $sql = "SELECT * FROM " . get_class($this) . " WHERE " . $arrayKeys[0] . " = " .  $objectVars[$arrayKeys[0]];

        $returnedArray = array();
        $returnedArray = $Database->selectAssc($sql);
        ob_start();
        var_dump($returnedArray); // output txt here
        error_log(ob_get_clean()."\n",3,'C:/xampp/htdocs/RecipeWebsite/output.txt');
        if(isset($returnedArray[0]) && !empty($returnedArray[0]))
        {
            $row = $returnedArray[0];
            $counter = 0;
            foreach ($this as $key => $value) 
            {
                $this->$key = $row[$arrayKeys[$counter]];
                $counter++;
            }
        }
        ob_start();
        var_dump($this); // output txt here
        error_log(ob_get_clean()."\n",3,'C:/xampp/htdocs/RecipeWebsite/output.txt');

    }
}

