
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?page=accounts&action=logout" style="color: black;font-weight: bold"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
      
      </ul>
    </div>
  </div>
</nav>





<div class="container">
    <div class="row">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                  <label id="lbltipAddedComment"><strong>User Tasks</strong></label>
                  
                </div>
                <div class="panel-body">
              <form  id="Register" action="index.php?page=tasks&action=create" method="POST" class="form-horizontal" role="form">
                <input type="submit" value="Create" name="Create" id="Create">
                <div class="container" class="form-group">
            <?php        
            print utility\displaytable::showTable($data);
            ?>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
<script type="text/javascript">
        window.onload = function() {
  
  //alert(document.URL);
  //var url_string = "http://www.example.com/t.html?a=1&b=3&c=m2-m3-m4-m5"; //window.location.href
  //var url = new URL(window.location.href);
  //var c = url.searchParams.get("all");
  //alert(c);

  var url = window.location.href.search("all");
  if(url>0)
  {
    document.getElementById('Create').style.display="none";
    document.getElementById('lbltipAddedComment').innerHTML = 'All Tasks';
  }
};


    </script>
</body>
</html>