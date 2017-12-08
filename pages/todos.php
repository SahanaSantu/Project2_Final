$data=todos::findall(); 
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
              <form  id="Register" action="index.php?page=tasks&action=create" method="POST" class="form-horizontal" role="form">
                <input type="submit" value="Create" name="Create">
                <div class="container" class="form-group">
            <?php        
            print utility\htmlTable::displaytable($data);
            ?>
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