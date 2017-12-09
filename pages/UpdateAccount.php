<?php

define('HOST', 'mysql:dbname=su83;host=sql2.njit.edu');
define('USERNAME', 'su83');
define('PASSWORD', '63Xs37fY');

//DB connection
class dbConn{
    //variable to hold connection object.
    protected static $db;
    //private construct - class cannot be instatiated externally.
    private function __construct() {
        try {
            // assign PDO object to db variable
            self::$db = new PDO(HOST,USERNAME,PASSWORD);
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            //echo "Connection success: ";
            
        }
        catch (PDOException $e) {
            //Output error - would normally log this to error file rather than output to user.
            echo "Connection Error: ";
        }
    }
    // get connection function. Static method - accessible without instantiation
    public static function getConnection() {
        //Guarantees single instance, if no connection object exists then create one.
        if (!self::$db) {
            //new connection object.
            new dbConn();
        }
        //return connection.
        return self::$db;
    }
}



class collection {
    
    //getting model fpr the table
    static public function create() {
      $model = new static::$modelName;
      return $model;
    }

   //function for db staemetns execution
   static public function execute($sql){
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet;
    }
    
    //function to retreive full table
    static public function findAll() {
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName;
        $recordsSet =  self::execute($sql);
        return $recordsSet;
    }

    //function to retreive specific row based on id
    static public function findOne($id) {
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
        $recordsSet =  self::execute($sql);
        return $recordsSet[0];
    }

    //function to get max id or recent inserted id
    static public function findmax(){
        $tableName = get_called_class();
        $sql = 'SELECT max(id) FROM ' . $tableName;
        $recordsSet =  self::execute($sql);
        return $recordsSet[0];  
    }
}

class accounts extends collection {
    protected static $modelName = 'accounts';

}
class todos extends collection {
    protected static $modelName = 'todo';
}


class htmlTable
{
    public static function genarateTableFromMultiArray($array)
    {
        $tableGen = '<table border="1"cellpadding="10">';
        $tableGen .= '<tr>';
        //this grabs the first element of the array so we can extract the field headings for the table
       
        //this gets the page being viewed so that the table routes requests to the correct controller
        
        foreach ($array[1] as $key => $value) {
          //  $tableGen .= '<th>' '</th>';
            $tableGen .= '<th>' . htmlspecialchars($key) . '</th>';

        }
        $tableGen .= '</tr>';
        foreach ($array as $record) {
            $tableGen .= '<tr>';
            foreach ($record as $key => $value) {
                if ($key == 'id') {
                    $tableGen .= '<td><a href="'. $value . '">Delete</a>&nbsp;&nbsp;&nbsp;<a href="'. $value . '">View</a></td>';
                   // $tableGen .= '<td></td>';
                    
                } else {
                    $tableGen .= '<td>' . $value . '</td>';
                }
            }
            $tableGen .= '</tr>';
        }
        $tableGen .= '</table>';
        return $tableGen;
    }
    public static function generateTableFromOneRecord($innerArray)
    {
        $tableGen = '<table border="1" cellpadding="10"><tr>';
        $tableGen .= '<tr>';
        foreach ($innerArray as $innerRow => $value) {
            $tableGen .= '<th>' . $innerRow . '</th>';
        }
        $tableGen .= '</tr>';
        foreach ($innerArray as $value) {
            $tableGen .= '<td>' . $value . '</td>';
        }
        $tableGen .= '</tr></table><hr>';
        return $tableGen;
    }
}

// To display the table
class display_tab{

//fucntion to display reuslt in table
public function display($records){

    print htmlTable::genarateTableFromMultiArray($records); 
  /* echo '<table border="1">';
  
   {
    $first_row=true;
    foreach ($records as $row) {
        if ($first_row) {
            // Output header row from keys.
            echo '<tr>';
            foreach($row as $key => $field) {
                echo '<th>' . htmlspecialchars($key) . '</th>';
            }
        echo '</tr>';
        $first_row = false;
    }
    echo '<tr>';
    //'<td>'.'<input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">'.'</td>'
    foreach($row as $key => $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
    }
   }
 
echo '</table>';*/
}


}



class model {
    protected $tableName;
   
   //function to perform update/delete 
   public function save()
    {
        $tableName = get_called_class();
        $array = get_object_vars($this);
        unset($array['tableName']);
       
        if($this->id!='')
        {
            $sql = $this->update($array);
            
        }
        else
        {
            $sql = $this->insert($array);
        }
        $this->execute($sql);
      
    }

    //function for insert query
    private function insert($array) {
        $columnString = implode(',', array_keys($array));
        $valueString = "'".implode("','",$array)."'";
        $sql = "INSERT INTO $this->tableName ($columnString) VALUES ( $valueString)";
        return $sql;
    }

    //function for update query
    private function update($array) {
          
          $id=current($array);
          unset($array['id']);
          $var="";
          foreach ($array as $key => $value) {
            $var .= $key."='".$value."',";
          }
          $Update_Fields = rtrim($var,",");
          
          $sql = "UPDATE $this->tableName SET $Update_Fields WHERE id=$id";
          return $sql;  
    }
    
    //function for deletion
    public function delete() {
        $sql= "DELETE from $this->tableName WHERE id='$this->id'";
        $this->execute($sql);
        
    }

    public function execute($sql){
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
    }
}

class account extends model {
    public $id;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;


    public function __construct()
    {
        $this->tableName = 'accounts';
    
    }

   
}



class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;



    public function __construct()
    {
        $this->tableName = 'todos';
    
    }

   
}

//accounts find all and find one records


$records_acc = accounts::findOne(1);

?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>

<body style="background-image:url(https://www.taurho-transcribes.co.uk/wp-content/uploads/2017/02/Login-background-image-resized.png)">



<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Update Account</strong>
                </div>
                <div class="panel-body">

              <form  id="Update" action="https://web.njit.edu/~su83/Project2_Final/Login.php" method="POST" class="form-horizontal" role="form">

        <div class="container" class="form-group">
        <label><b>Username</b></label>
        <input type="email" placeholder="Enter Username/Email" name="uname" value="<?php echo $records_acc[email]?>" required><br>


        <label><b>Password</b></label>
        <input type="Number" placeholder="Select Number" name="Accountid"  value="<?php echo $records_acc[password]?>"  required><br>

        <label><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo $records_acc[fname]?>"  required><br>

        <label><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $records_acc[lname]?>"  required><br>
             
        <label><b>Phone</b></label>
        <input type="tel" placeholder="Enter Phone Number" name="pnumber" value="<?php echo $records_acc[phone]?>"  required><br>

        <label><b>BirthDay</b></label>
        <input type="date" placeholder="Enter Birth Day" name="Bday" value="<?php echo $records_acc[birthday]?>"  required><br>

        <label><b>Gender</b></label>
       <select name="gender">
         <option><?php echo $records_acc[gender]?></option> 
        <option ><?php if ($records_acc[gender]=="male"){echo "female";}else{echo "male";}?></option>
       </select>
        <br>
        <input type="submit" value="Update" name="Update" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>


      </form>
      <form id="delete" action="https://web.njit.edu/~su83/Project2_Final/Register.php" method="POST" class="form-horizontal" role="form">
        <div class="container" class="form-group">
         <input type="submit" value="Delete" name="Delete" />
        </div> 
      </form>   
     </div>
    </div>
   </div>
 </div>
</div> 
</body>
</html>