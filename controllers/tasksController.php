<?php
//Task controller page index.php?page=tasks redirects here
class tasksController extends http\controller
{
   //function to load template individual task index.php?page=tasks&action=show
    public static function show()
    {
         session_start();
           if(key_exists('userID',$_SESSION)) {
              $record = todos::findOne("id",$_REQUEST['id']);
              self::getTemplate('UpdateTodos', $record[0]);
           } else {
               echo "<script type='text/javascript'>alert('Session invalid please login again');</script>";
                header('Refresh: .001; index.php?page=homepage&action=show');
           }
    }

    //function to dsiaplay all tasks index.php?page=tasks&action=all
    public static function all()
    {
        $records = todos::findAll();
        
       session_start();
           if(key_exists('userID',$_SESSION)) {
              self::getTemplate('usertasks', $records);
           } else {
               echo "<script type='text/javascript'>alert('Session invalid please login again');</script>";
                header('Refresh: .001; index.php?page=homepage&action=show');
           }
        
    }

    //function to display logged in user tasks index.php?page=tasks&action=getById
    public static function getById()
    {
      session_start();
          
           if(key_exists('userID',$_SESSION)) {
               $userID = $_SESSION['userID'];
               
               $records = todos::findOne("ownerid","$userID");
               self::getTemplate('usertasks', $records);
           } else {
               echo "<script type='text/javascript'>alert('Session invalid please login again');</script>";
                header('Refresh: .001; index.php?page=homepage&action=show');
           }
       
    }


    //function to load task creation template index.php?page=tasks&action=create
    public static function create()
    {
        self::getTemplate('CreateTodos');
    }
    
    //function to load editing tempalte for task index.php?page=tasks&action=edit
    public static function edit()
    {
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('edit_task', $record);
    }
    
    //function to update task index.php?page=tasks&action=store
    public static function store()
    {
        session_start();
        $task = new todo();
        $task->owneremail = $_POST['email'];
        $task->createddate = $_POST['cdate'];
        $task->duedate = $_POST['ddate'];
        $task->message = $_POST['message'];
        $task->isdone = $_POST['status'];
        $task->ownerid = $_SESSION['userID'];
        $task->save();
        header("Location: index.php?page=tasks&action=getById");
       
    }

    //function to save new tasks index.php?page=tasks&action=save
    public static function save() {
        $task = new todo();
        $task->owneremail = $_POST['email'];
        $task->createddate = $_POST['cdate'];
        $task->duedate = $_POST['ddate'];
        $task->message = $_POST['message'];
        $task->isdone = $_POST['status'];
        $task->id = $_POST['id'];
        $task->ownerid = $_POST['ownerid'];
        $task->save();
        header("Location: index.php?page=tasks&action=getById");
    }
    
    //function to delete tasks index.php?page=tasks&action=delete
    public static function delete()
    {
        
        $record = new todo();
        $record->delete($_REQUEST['id']);
        
        header("Location: index.php?page=tasks&action=getById");
    }
}
?>