<?php
namespace collections;
use DbConnection;
use \PDO;
abstract class collection {
    
    //getting model for the table
    static public function create() {
      $model = new static::$modelName;
      return $model;
    }

   //function for db statements execution
   static public function execute($sql){
        $db = DbConnection\dbConn::getConnection();
        $statement = $db->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet;
    }
    
    //function to retreive full table
    static public function findAll() {
        $tableName = substr(get_called_class(), strrpos(get_called_class(), '\\') + 1);
        $sql = 'SELECT * FROM ' . $tableName;
        $recordsSet =  self::execute($sql);
        return $recordsSet;
    }

    //function to retreive specific row based on id
    static public function findOne($id) {
        $tableName = substr(get_called_class(), strrpos(get_called_class(), '\\') + 1);
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
        $recordsSet =  self::execute($sql);
        return $recordsSet;
    }

    //function to get max id or recent inserted id
    static public function findmax(){
        $tableName = substr(get_called_class(), strrpos(get_called_class(), '\\') + 1);
        $sql = 'SELECT max(id) FROM ' . $tableName;
        $recordsSet =  self::execute($sql);
        return $recordsSet[0];  
    }
}

?>
