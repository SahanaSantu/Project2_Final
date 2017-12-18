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


<form>
        <div class="container" class="form-group">
            <input type="submit" value="<-Back" name="back" onclick="goBack()" />
        </div>
    </form>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Sign Up</strong>
                </div>
                <div class="panel-body">
              <form  id="Register" action="index.php?page=accounts&action=store" method="POST" class="form-horizontal" role="form">

                <div class="container" class="form-group">
        <label><b>Username</b></label><br>
        <input type="email" placeholder="Enter Username/Email" name="uname" required><br>

       <!-- <label><b>Email</b></label><br>
        <input type="text" placeholder="Enter Email" name="email" required><br>-->

        <label><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="pwd" minlength="6" required><br>

        <label><b>First Name</b></label><br>
        <input type="text" placeholder="Enter First Name" name="fname" pattern="[A-Za-z]*" title="Enter only characters" required><br>

        <label><b>Last Name</b></label><br>
        <input type="text" placeholder="Enter Last Name" name="lname" pattern="[A-Za-z]*" title="Enter only characters" required><br>
             
        <label><b>Phone</b></label><br>
        <input type="text" placeholder="Enter Phone Number" pattern="[0-9]*.{10,10}" maxlength="10"  name="pnumber" title="Enter 10 digit phone number" required><br>

        <label><b>BirthDay</b></label><br>
        <input type="date" placeholder="Enter Birth Day" name="Bday" required><br>

        <label><b>Gender</b></label><br>
        <input type="radio" name="gender" value="male" checked> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <br>


        <input type="submit" value="Sign up" name="signup"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

function goBack() {
        window.history.back();
        
        
}
form=document.getElementById("Login");
function checknumber(){
    
     var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
   var pno = document.forms["Register"]["pnumber"].value;
   //alert(pno);

        if((document.forms["Register"]["pnumber"].value.match(phoneno)))  
        {  
           form.action="index.php?page=accounts&action=store";
           form.submit();
        }  
        else  
        {  
        alert("phone number should in format xxx-xxx-xxxx");  
        return false;  
        }
}

 
</script>
</body>
</html>