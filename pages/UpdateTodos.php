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
                  <strong>Update Task</strong>
                </div>
                <div class="panel-body">
              <form  id="Register" action="index.php?page=tasks&action=save" method="POST" class="form-horizontal" role="form">

                <div class="container" class="form-group">
        <label><b>Owner Email</b></label>
        <input type="email" placeholder="Enter Username" name="email" value="<?php echo $data['owneremail']?>" required><br>

        <label><b>Created Date</b></label>
        <input type="date" placeholder="Enter Created Date" name="cdate" value="<?php echo $data['createddate']?>" title="Dates cannot be modified" readonly><br>

        <label><b>Due Date</b></label>
        <input type="Date" placeholder="Enter Due Date" name="ddate" value="<?php echo $data['duedate']?>" title="Dates cannot be modified" readonly><br>
             
        <label><b>Message</b></label>
        <input type="text" placeholder="Enter Message" name="message" value="<?php echo $data['message']?>" required><br>
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
        <input type="hidden" name="ownerid" value="<?php echo $data['ownerid']?>">
        <label><b>Status</b></label>
        <select name="status">
         <option><?php echo $data['isdone']?></option> 
        <option ><?php if ($data['isdone']==1){echo "0";}else{echo "1";}?></option>
       </select>
        <br>
        <br>
        <input type="submit" value="Update" name="Update Task" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </form>
    </form>
      <form id="delete" action="index.php?page=tasks&action=delete" method="POST" class="form-horizontal" role="form">
        <div class="container" class="form-group">
        <input type="hidden" name="id" value="<?php echo $data['id']?>">
         <input type="submit" value="Delete" name="Delete" />
        </div> 
      </form>  
        <!--<input type="submit" value="Cancel" name="Cancel" onclick="askForCancel()" />-->
   </div>
    </div>
   </div>
 </div>
</div> 

</body>
</html>