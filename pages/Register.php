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
                  <strong>Sign Up</strong>
                </div>
                <div class="panel-body">
              <form  id="Register" action="https://web.njit.edu/~su83/Project2_Final/Login.php" method="POST" class="form-horizontal" role="form">

                <div class="container" class="form-group">
        <label><b>Username</b></label><br>
        <input type="email" placeholder="Enter Username/Email" name="uname" required><br>

       <!-- <label><b>Email</b></label><br>
        <input type="text" placeholder="Enter Email" name="email" required><br>-->

        <label><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="psd" required><br>

        <label><b>First Name</b></label><br>
        <input type="text" placeholder="Enter First Name" name="fname" required><br>

        <label><b>Last Name</b></label><br>
        <input type="text" placeholder="Enter Last Name" name="lname" required><br>
             
        <label><b>Phone</b></label><br>
        <input type="tel" placeholder="Enter Phone Number" name="pnumber" required><br>

        <label><b>BirthDay</b></label><br>
        <input type="date" placeholder="Enter Birth Day" name="Bday" required><br>

        <label><b>Gender</b></label><br>
        <input type="radio" name="gender" value="male" checked> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <br>
        <input type="submit" value="Sign up" name="signup" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
form=document.getElementById("Register");
function askForCancel() {
        document.getElementById("Register").reset();
        
        
}
function askForRegister() {
        
        form.action="https://web.njit.edu/~su83/Project2_Final/Login.php";
        form.submit();
}
 
</script>
</body>
</html>