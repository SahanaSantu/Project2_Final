<?php
namespace database;
use http\controller;

//abstract class model for defining model
abstract class model {
    protected $tableName;
   
   //function to perform update/delete 
   public function save()
    {
        $modelName = static::$modelName;
        $tableName = $modelName::getTablename();
        $array = get_object_vars($this);
        unset($array['tableName']);
       
        if($this->id!='')
        {
            $sql = $this->update($array,$tableName);
            
        }
        else
        {
            $sql = $this->insert($array,$tableName);
        }
        $this->execute($sql);
      
    }

    //function for insert query
    private function insert($array,$tableName) {
        $columnString = implode(',', array_keys($array));
        $valueString = "'".implode("','",$array)."'";
        $sql = "INSERT INTO $tableName ($columnString) VALUES ( $valueString)";
        return $sql;
    }

    //function for update query
    private function update($array,$tableName) {
          
          $id=current($array);
          unset($array['id']);
          $var="";
          foreach ($array as $key => $value) {
            $var .= $key."='".$value."',";
          }
          $Update_Fields = rtrim($var,",");
          
          $sql = "UPDATE $tableName SET $Update_Fields WHERE id=$id";
          return $sql;  
    }
    
    //function for deletion
    public function delete($id) {
      $modelName = static::$modelName;
        $tableName = $modelName::getTablename();
        $sql= "DELETE from $tableName WHERE id='$id'";
        $this->execute($sql);
        
    }

    // query execution
    public function execute($sql){
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
    }
}



?>