<?php
//class for collection accounts
class accounts extends \database\collection
{
    protected static $modelName = 'account';
    //Function to get user details by UserID/Email
    public static function findUserbyEmail($email)
    {
            $tableName = get_called_class();
            $sql = 'SELECT * FROM ' . $tableName . ' WHERE email = '. "'".$email."'";
          
            $recordsSet = self::getResults($sql);
           
            if (empty($recordsSet)) {
                return FALSE;
            } else {
                return $recordsSet[0];
            }
    }
}
