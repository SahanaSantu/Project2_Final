<?php
Namespace Model;
use DbConnection;
use \PDO;

//abstract class model for defining model
abstract class model {
    protected $tableName;
   
   //function to perform update/delete 
   public function save()
    {
        $tableName = substr(get_called_class(), strrpos(get_called_class(), '\\') + 1);;
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

    // query execution
    public function execute($sql){
        $db = DbConnection\dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
    }
}



?>