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
                  <strong>Create Task</strong>
                </div>
                <div class="panel-body">
              <form  id="Register" action="index.php?page=tasks&action=store" method="POST" class="form-horizontal" role="form">

                <div class="container" class="form-group">
        <label><b>Owner Email</b></label><br>
        <input type="email" placeholder="Enter Username" name="email" required><br>

        <label><b>Created Date</b></label><br>
        <input type="date" placeholder="Enter Created Date" name="cdate" id="cdate" required><br>

        <label><b>Due Date</b></label><br>
        <input type="Date" placeholder="Enter Due Date" name="ddate" id="ddate" min="new Date(document.getElementById('cdate').value).getTime()" onblur="compare()" required><br>
             
        <label><b>Message</b></label><br>
        <input type="text" placeholder="Enter Message" name="message" required><br>

        <label><b>Status</b></label><br>
        <select name="status">
         <option>0</option> 
        <option >1</option>
       </select>
        <br>
		<br>
        <input type="submit" value="Create" name="Create Task" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset">
        <!--<input type="submit" value="Cancel" name="Cancel" onclick="askForCancel()" />-->
      </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

<script>
 
function compare(){
    var fromdate = document.getElementById('cdate').value;
    var enddate = document.getElementById('ddate').value;
    if( (new Date(enddate).getTime() < new Date(fromdate).getTime()))
    {
		alert("Due Date should be greater than Created Date");
        
    }
	
}
 
 
</script>
</body>
</html>