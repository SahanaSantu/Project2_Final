<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Final project</title>
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
                  <strong>Login</strong>
                </div>
                <div class="panel-body">
                <form id="Login" action="index.php?page=accounts&action=login" method="POST" class="form-horizontal" role="form">

                <div class="container" class="form-group">
                    <label><b>Username</b></label><br>
                    <input type="text" placeholder="Enter Username" name="uname" required><br>
             
                    <label><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="psd" required><br>

                    <input type="submit" value="Sign In" name="Sign In" />
    
                </div>


                </form>
            </div>
  <div class="panel-footer">
                    Not Registered? <a href="https://web.njit.edu/~su83/Project2_Final/Register.php">Register here</a></div>
            </div>
        </div>
    </div>
</div>


</body>
</html>