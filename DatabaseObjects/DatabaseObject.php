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
            throw new Exception('Need to set a primary key to search for a database object');
            return;
        }
        $Database = new Database();
        $sql = "SELECT * FROM " . get_class($this) . " WHERE " . $arrayKeys[0] . " = " .  $objectVars[$arrayKeys[0]];

        $returnedArray = array();
        $returnedArray = $Database->selectAssc($sql);
        if(isset($returnedArray[0]) && !empty($returnedArray[0]))
        {
            $row = $returnedArray[0];
            $counter = 0;
            foreach ($this as $key => $value) 
            {
                $this->$key = trim($row[$arrayKeys[$counter]]);
                $counter++;
            }
        }
    }

    function update_obj()
    {
        $objectVars = get_object_vars($this);
        $arrayKeys = array_keys($objectVars);
        if($objectVars[$arrayKeys[0]] === null) //if primary key not set cannot update
        {
            throw new Exception('Need to set a primary key to update a database object');
            return;
        }
        $Database = new Database();
        $sql = "UPDATE " . get_class($this) . " set ";
        $counter = 0;
        $tempLength = count($objectVars);
        foreach($this as $key => $value) 
        {
            if($value !== null)
            {
                if($counter !== 0 && $counter !== $tempLength)
                {
                    $sql .= " ,";
                }
                if(gettype($value) === "string")
                {
                    $sql .= ' ' . $key . ' = "'.$value.'" ';
                }
                else
                {
                    $sql .= " $key  = $value ";
                }
                $counter++;
            }
            else
            {
                $tempLength--;
            }
        }
        $sql .= "WHERE " . $arrayKeys[0] . " = " . $objectVars[$arrayKeys[0]];
        $Database->update($sql);
    }

    function delete_obj()
    {
        $objectVars = get_object_vars($this);
        $arrayKeys = array_keys($objectVars);
        if($objectVars[$arrayKeys[0]] === null) //if primary key not set cannot update
        {
            throw new Exception('Need to set a primary key to delete a database object');
            return;
        }
        $Database = new Database();
        $sql = "DELETE FROM " . get_class($this) . " WHERE " . $arrayKeys[0] . " = " .  $objectVars[$arrayKeys[0]];
        $Database->delete($sql);
    }

    function insert_obj()
    {
        $objectVars = get_object_vars($this);
        $arrayKeys = array_keys($objectVars);
        if($objectVars[$arrayKeys[0]] !== null) //if primary key not set cannot update
        {
            throw new Exception('Cannot have a primary key set to insert a database object');
            return;
        }
        $Database = new Database();
        $sql = "INSERT INTO " . get_class($this) . "(";
        $counter = 0;
        $tempLength = count($objectVars);
        $val = "";
        $col = "";
        foreach($this as $key => $value) 
        {
            if($value !== null)
            {
                if($counter !== 0 && $counter !== $tempLength)
                {
                    $col .= " ,";
                    $val .= " ,";
                }
                $col .= $key;
                if(gettype($value) === "string")
                {
                    $val .= "'$value'";
                }
                else
                {
                    $val .= "$value";
                }
                $counter++;
            }
            else
            {
                $tempLength--;
            }
        }
        $sql .= $col . ") values(" . $val . ")";
        $Database->insert($sql);
    }
}

