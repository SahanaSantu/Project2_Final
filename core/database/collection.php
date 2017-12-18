<?php
namespace database;
//use DbConnection;
use \PDO;
abstract class collection {
    
    //getting model for the table
    static public function create() {
      $model = new static::$modelName;
      return $model;
    }

   //function for db statements execution
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
        $tableName = substr(get_called_class(), strrpos(get_called_class(), '\\') );
        $sql = 'SELECT * FROM ' . $tableName;
        $recordsSet =  self::execute($sql);
        return $recordsSet;
    }

    //function to retreive specific row based on id
    static public function findOne($col,$id) {
        $tableName = substr(get_called_class(), strrpos(get_called_class(), '\\') );
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE '. $col .'=' . $id;
        $recordsSet =  self::execute($sql);
        return $recordsSet;
    }

    static public function getResults($sql){
        $recordsSet =  self::execute($sql);
        return $recordsSet;  
    }
}

?>
