<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>

<body style="background-image:url(https://www.taurho-transcribes.co.uk/wp-content/uploads/2017/02/Login-background-image-resized.png)">



<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Create Task</strong>
                </div>
                <div class="panel-body">
              <form  id="Register" action="https://web.njit.edu/~su83/Project2_Final/Login.php" method="POST" class="form-horizontal" role="form">

                <div class="container" class="form-group">
        <label><b>Owner Email</b></label><br>
        <input type="email" placeholder="Enter Username" name="email" required><br>

        <label><b>Created Date</b></label><br>
        <input type="date" placeholder="Enter Created Date" name="cdate" required><br>

        <label><b>Due Date</b></label><br>
        <input type="Date" placeholder="Enter Due Date" name="ddate" min="new Date(document.getElementById('cdate').value).getTime()" required><br>
             
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
    var test = document.getElementById('email').value;
   alert(test);   
   var startDt = document.getElementById("cdate").value;
    var endDt = document.getElementById("ddate").value;
 
    if( (new Date(startDt).getTime() < new Date(endDt).getTime()))
    {
		alert("test");
        //document.getElementById("ddate").focus();
    }
	
}
 
 
</script>
</body>
</html>