<?php

    //connect to our database
    require_once('connection.php');
    global $loginError;
    
    
    //validate form data that is enter by user
    function validateFormData($formData) {
            $formData = trim(stripslashes(htmlspecialchars($formData)));
            return $formData;
    }

    $passwordh = password_hash("123abc", PASSWORD_DEFAULT);


    $query1 = "INSERT INTO users 
        (id,username, password, email, signup_date, biography) 
        VALUES(null,'john','$passwordh', 'john@gmail.com', CURRENT_TIMESTAMP, 'we all love rock and roll.')";
      

    if(isset($_POST['login'])) {
        
   
        $formUser = validateFormData($_POST['username']);
        $formPass = validateFormData($_POST['password']);

       // create query
       $query = "SELECT username, email, password FROM users 
                 WHERE username = '$formUser'";
        
       //store the results
       $result = mysqli_query($conn, $query);
       
       // if an result was return
       if(mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)) {
               $user    = $row['username'];
               $email   = $row['email'];
               $hashPass= $row['password'];
           }
           
           if(password_verify($formPass, $hashPass)) {
               // user provides correct login details
               session_start();
               
               $_SESSION['loggedInUser']    = $user;
               $_SESSION['loggedInEmail']   = $email;
               
               header("Location: profile.php");
           } else {
               $loginError = "<div class='alert alert-danger'> username and password combination is incorrect! Try again. </div>";
           }
       }else{
           $loginError = "<div class='alert alert-danger'> No such user is found. Try again.<a class'= close' data-dismiss='alert'>&times;</a></div>";
       }
        
        mysqli_close($conn);
     }

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
    
    <?php 
      
//       if(mysqli_query($conn,$query1)){
//           echo "Inserted";
//       }else{
//           echo "Not inserted".mysqli_error($conn);
//       }
      ?>
    <div class="container">

     <?php echo $loginError; ?>
      <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] ); ?>" 
       method="post">
       
        <h2 class="form-signin-heading">Please sign in</h2>
        
        <label for="input-username" class="sr-only">User Name</label>
        <input type="text"  class="form-control" placeholder="User Name" autofocus id="login-username" name="username">
        
        <label for="input-password" class="sr-only">Password</label>
        <input type="password"  class="form-control" placeholder="Password" autofocus id="login-password" name="password">
        
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" />
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/jquery-2.2.2.min"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
