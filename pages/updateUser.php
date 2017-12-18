<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>

<body style="background-image:url(https://grantcardonetv.com/wp-content/uploads/todo_list.jpg)">

<nav class="navbar ">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active" >
    <li class="active"><a href="index.php?page=tasks&action=getById" style="color: black;font-weight: bold" >My tasks </a></li>
    <li ><a  href="index.php?page=accounts&action=all" style="color: black;font-weight: bold" >All Accounts </a></li>
    <li><a href="index.php?page=tasks&action=all" style="color: black;font-weight: bold">All Tasks </a></li>
    <li><a href="index.php?page=accounts&action=updateUser" style="color: black;font-weight: bold">Update Account </a></li>
      </ul>
      
    </div>
  </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Update Account</strong>
                </div>
                <div class="panel-body">

              <form  id="Update" action="index.php?page=accounts&action=updateAccount" method="POST" class="form-horizontal" role="form">

        <div class="container" class="form-group">
        <label><b>Username</b></label>
        <input type="email" placeholder="Enter Username/Email" name="uname" value="<?php echo $data['email']?>" title="User Name is not editable" readonly><br>

        <label><b>old Password</b></label>
        <input type="password" placeholder="Old Password" name="currentpwd" required><br>

        <label><b>New Password</b></label>
        <input type="password" placeholder="New Password" name="pwd" minlength="6" required><br>

        <label><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo $data['fname']?>" pattern="[A-Za-z]*" title="Enter only characters" required><br>

        <label><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $data['lname']?>" pattern="[A-Za-z]*" title="Enter only characters" required><br>
             
       
        <input type="hidden" name="pnumber"  value="<?php echo $data['phone']?>" ><br>
        <input type="hidden" name="Bday" value="<?php echo $data['birthday']?>"><br>
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
         <input type="hidden" name="gender" value="<?php echo $data['gender']?>">
       
        <br>
        <input type="submit" value="Update" name="Update" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>


      </form>
      
     </div>
    </div>
   </div>
 </div>
</div> 
</body>
</html>