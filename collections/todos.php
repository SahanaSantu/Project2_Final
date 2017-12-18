<?php

//collection class to get todo items
class todos extends database\collection
{
    protected static $modelName = 'todo';
    //Function to get User details by ID
    public static  function findTasksbyID($userid) {
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE ownerid = ?';
        $recordsSet = self::getResults($sql, $userid);
        if (is_null($recordsSet)) {
            return FALSE;
        } else {
            return $recordsSet;
        }
    }
}
?>
