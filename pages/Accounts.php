$data=accounts::findall(); 
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
                  <strong>All Accounts</strong>
                </div>
                <div class="panel-body">
              <form  id="Register"  class="form-horizontal" role="form">

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



</body>
</html>