<?php
//interface to check and set password
interface iaccount{
    public function setPassword($password);
    public function checkPassword($LoginPassword,$savedpwd);
}

//account implement interface iaccount
final class account extends \database\model implements iaccount 
{
    public $id;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;
    protected static $modelName = 'account';
    public static function getTablename()
    {
        $tableName = 'accounts';
        return $tableName;
    }
    
   

    //find tasks based on ID
    public static function findTasks($id)
    {
        
        $records = todos::findOne($id);
        return $records;
    }
   

    //function to set password
    public function setPassword($password) {
        //Generating password using bcrypt with default settings
        $password = password_hash($password, PASSWORD_BCRYPT);
        return $password;
    }
    //function to check password
    public function checkPassword($LoginPassword,$savedpwd) {
        //verify the user entered password
        return password_verify($LoginPassword, $savedpwd);
    }
}
  
?>