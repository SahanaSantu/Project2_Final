<?php

//account controller page index.php?page=accounts redirects here
class accountsController extends http\controller
{
    //function to show indivdual accoutn details for editing index.php?page=accounts&action=show
    public static function show()
    {
        $record = accounts::findOne("id",$_REQUEST['id']);
       
        self::getTemplate('UpdateAccount', $record[0]);
    }
     
    //function to load page for logged in user updation index.php?page=accounts&action=updateUser
    public static function updateUser()
    {
        session_start();

        $record = accounts::findOne("id",$_SESSION["userID"]);
       
        self::getTemplate('updateUser', $record[0]);
    }

    //fucntion to list all all accounts index.php?page=accounts&action=all
    public static function all()
    {
        session_start();
        //session check
           if(key_exists('userID',$_SESSION)) {
        $records = accounts::findAll();
        self::getTemplate('all_accounts', $records);
        } 
        else {
               echo "<script type='text/javascript'>alert('Session invalid please login again');</script>";
                header('Refresh: .001; index.php?page=homepage&action=show');
           }
    }
    
    //function for template register index.php?page=accounts&action=register
    public static function register()
    {
        self::getTemplate('register');
    }
    //function for new user registration index.php?page=accounts&action=store
    public static function store()
    {
        $user = accounts::findUserbyEmail($_REQUEST['uname']);
        if ($user == FALSE) {
            $user = new account();
            $user->email = $_POST['uname'];
            $user->fname = $_POST['fname'];
            $user->lname = $_POST['lname'];
            $user->phone = $_POST['pnumber'];
            $user->birthday = $_POST['Bday'];
            $user->gender = $_POST['gender'];
            $user->password = $user->setPassword($_POST['pwd']);
           
            $user->save();
            
            header("Location: index.php?page=homepage&action=show");
        } else {
            $error = 'already registered';
            self::getTemplate('error', $error);
        }
    }
  
   //function to save other user edited details index.php?page=accounts&action=save
    public static function save() {
        
        $user = new account();
        $user->email = $_POST['uname'];
        $user->fname = $_POST['fname'];
        $user->lname = $_POST['lname'];
        $user->phone = $_POST['pnumber'];
        $user->birthday = $_POST['Bday'];
        $user->gender = $_POST['gender'];
        $user->password = $_POST['pwd'];
        $user->id = $_POST['id'];
        $user->save();
        header("Location: index.php?page=accounts&action=all");
    }

    //function to save current user account index.php?page=accounts&action=updateAccount
    public static function updateAccount() {

        $currentuser = accounts::findUserbyEmail($_POST['uname']);
       
        $user = new account();

        if($user->checkPassword($_POST['currentpwd'],$currentuser["password"]))
        {
        $user->email = $_POST['uname'];
        $user->fname = $_POST['fname'];
        $user->lname = $_POST['lname'];
        $user->phone = $_POST['pnumber'];
        $user->birthday = $_POST['Bday'];
        $user->gender = $_POST['gender'];

        $user->password = $user->setPassword($_POST['pwd']);
        $user->id = $_POST['id'];
        $user->save();
        echo "<script type='text/javascript'>alert('Users details updated');</script>";
        header('Refresh: .001; index.php?page=tasks&action=getById');
        }
        else
        {
            echo "<script type='text/javascript'>alert('Wrong Password');</script>";
               header('Refresh: .001; index.php?page=accounts&action=updateUser');
        }
    }

    //function to delete user index.php?page=accounts&action=delete
    public static function delete() {
       
        $record = accounts::findOne("id",$_REQUEST['id']);
        $currentuser = new account();
        $currentuser->delete($_REQUEST['id']);
        header("Location: index.php?page=accounts&action=all");
    }
    
    //login the user index.php?page=accounts&action=login
    public static function login()
    {
     
        $user = accounts::findUserbyEmail($_REQUEST['uname']);
        
      //test for existing account
        if ($user == FALSE) {
           echo "<script type='text/javascript'>alert('User Not Found');</script>";
            header('Refresh: .001; index.php?page=homepage&action=show');
        } else {
            $currentuser = new account();
            //test password
            if($currentuser->checkPassword($_POST['pwd'],$user["password"])) {
                session_start();
                $_SESSION["userID"] = $user["id"];
                header("Location: index.php?page=tasks&action=getById");
            } else {
                echo "<script type='text/javascript'>alert('Wrong Password');</script>";
                header('Refresh: .001; index.php?page=homepage&action=show');
            }
        }
    }

   //function to logout index.php?page=accounts&action=logout
    public static function logout()
    {
        //destroy sesions.
        session_start();
        session_destroy();
        session_unset();
        header("Location: index.php");
    }
}