<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Final project</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>



<body style="background-image:url(https://grantcardonetv.com/wp-content/uploads/todo_list.jpg)">


    <h1 style="text-align: center; font-weight: bold;">WSD Project</h1>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Login</strong>
                </div>
                <div class="panel-body">
                <form id="Login" action="index.php?page=accounts&action=login" method="POST" class="form-horizontal" role="form">

                <div class="container" class="form-group">
                    <label><b>Username</b></label><br>
                    <input type="email" placeholder="Enter Username" name="uname" required><br>
             
                    <label><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="pwd" required><br>

                    <input type="submit" value="Sign In" name="Sign In" />
    
                </div>


                </form>
            </div>
  <div class="panel-footer">
                    Not Registered? <a href="index.php?page=accounts&action=register">Register here</a></div>
            </div>
        </div>
    </div>
</div>


</body>
</html>