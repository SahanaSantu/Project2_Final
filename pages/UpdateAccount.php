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

              <form  id="Update" action="index.php?page=accounts&action=save" method="POST" class="form-horizontal" role="form">

        <div class="container" class="form-group">
        <label><b>Username</b></label>
        <input type="email" placeholder="Enter Username/Email" name="uname" value="<?php echo $data['email']?>" readonly title="Cannot edit other users credentails"><br>


        <label><b>Password</b></label>
        <input type="password" placeholder="Password" name="pwd"  value="<?php echo $data['password']?>" title="Cannot edit other users credentails" readonly><br>

        <label><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo $data['fname']?>" pattern="[A-Za-z]*" title="Enter only characters" required><br>

        <label><b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $data['lname']?>" pattern="[A-Za-z]*" title="Enter only characters" required><br>
             
        <label><b>Phone</b></label>
        <input type="text" placeholder="Enter Phone Number" pattern="[0-9]*.{10,10}" maxlength="10" name="pnumber" value="<?php echo $data['phone']?>" title="Enter 10 digit phone number"  required><br>

        <label><b>BirthDay</b></label>
        <input type="date" placeholder="Enter Birth Day" name="Bday" value="<?php echo $data['birthday']?>"  required><br>
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <label><b>Gender</b></label>
       <select name="gender">
         <option><?php echo $data['gender']?></option> 
        <option ><?php if ($data['gender']=="male"){echo "female";}else{echo "male";}?></option>
       </select>
        <br>
        <input type="submit" value="Update" name="Update" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>


      </form>
      <form id="delete" action="index.php?page=accounts&action=delete" method="POST" class="form-horizontal" role="form">
        <div class="container" class="form-group">
            <input type="hidden" name="id" value="<?php echo $data['id']?>">
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