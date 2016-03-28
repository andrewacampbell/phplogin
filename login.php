<?php

    require_once('connection.php');



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 
  <body>

    <div class="container">

      <form class="form-signin" action="echo htmlspecialchars($_SERVER['PHP_SELF] ); ?>" 
       method="post">
       
        <h2 class="form-signin-heading">Please sign in</h2>
        
        <label for="input-username" class="sr-only">User Name</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="User Name" required autofocus id="login-username" name="username">
        
        <label for="input-password" class="sr-only">Password</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Password" required autofocus id="login-password" name="password">
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" 
        name="login">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
