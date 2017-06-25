<?php
session_start();
$connection=mysqli_connect("localhost","root","","miniproject_faculty") or die("Unable to connect to the database!");
if(isset($_POST['register']))
{
    $username=mysqli_real_escape_string($connection,$_POST['username']);
    $email_id=mysqli_real_escape_string($connection,$_POST['email']);
    $branch=mysqli_real_escape_string($connection,$_POST['branch']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $mobile_no=mysqli_real_escape_string($connection,$_POST['mobile']);
    $secret_code=mysqli_real_escape_string($connection,$_POST['secretcode']);
    if($secret_code=="123456")
    {
        $sql="INSERT INTO faculty (user_id,username,email_id,password,branch,mobile_no,secret_code) VALUES (NULL, '$username', '$email_id', '$password', '$branch', '$mobile_no', '$secret_code');";
        mysqli_query($connection,$sql);
        $_SESSION['message']="You are now registered";
        header("location:login.php");
    }
    else{
        $_SESSION['message']="Invalid secret code";
    }

}

?>



<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/> 
    

    <!-- external CSS files -->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

   
  </head>

  <body>
     <nav class="grey darken-4" role="navigation">
         <div class="nav-wrapper container" style="font-family:OmegaFont;font-size:30px;">
            <a id="logo-container" class="center" href="index.php" class="brand-logo"><img src="cvrlogo.png" width="130px"></a>
            <a id="logo-container" class="center" class="brand-logo">CVR COLLEGE OF ENGINEERING</a>
            <!--<a id="logo-container" class="center" class="brand-logo">CVR COLLEGE OF ENGINEERING</a>-->
            
         </div>
      </nav>
      <nav class="grey darken-4" role="navigation" style:"height:26px;">
         <div class="nav-wrapper container" style="height:26px;">
            <ul class="right hide-on-med-and-down">
                <li><a href="about.html" style="color:white">About</a></li>
               <li><a href="index.php" style="color:white">Home</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="about.html">About</a></li>
               <li><a href="index.php">Home</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse">
            <i class="material-icons">menu</i></a>
         </div>
      </nav> 

  
      <div class="row">
            <div class="col-8">    
                <div class="container-fluid" style="background-color:#FFFFFF;">
                    <div class="container">
                        
                    </div>
                </div>
            </div>
        </div>
      
<div class="row">
  <div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-block">
          <h3 align="center" class="card-title">Faculty Account Registration</h3>
          <div class="container">
          <div class="col-sm-4">
              <div class="card">
                  <div class="card-block">
                      
                        <br>
                    <form action='' method="post">
                        Username:<input type="text" name="username">
                        Email id:<input type="text" name="email">
                        Branch: <input type="text" name="branch">
                        Password:<input type="password" name="password">
                        Repeat Pasword:<input type="password" name="rpassword">
                        Mobile Number:<input type="text" name="mobile">
                        Secret Code:<input type="password" name="secretcode">
                        <br>
                        <input type="submit" class="btn btn-primary" name="register" value="Register">
                        <br>
                         <?php
        if(isset($_SESSION['message']))
        {
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);    
            
        }

  ?>
                        </form> 
                  </div>
              </div>
          </div>
          </div>
    </div>
    </div>
  </div>
  </div>
  
</div>


      
      <footer class="page-footer black">
         <div class="footer-copyright">
            <div class="container center" style="color:white; font-size:10px">
               <h6>Mini Project on "Design and Implementation of Web-based system for course outcomes data analysis"</h6>
               <div class="row center">
                   <div class="col-md-3" style="font-size:18px">
                       <br>Contributors:
                       <div style="font-size:12px;padding-top:10px;">
                           Suhas Gudaboina<br>Uzma Farhath<br>Yashwanth Reddy
                       </div>
                   </div>
                    <div class="col-md-9" style="font-size:18px">
                        <br>Mentor:
                       <div style="font-size:12px;padding-top:10px;">
                           Dr. K. Venkateshwara Rao ( Professor CSE )
                       </div>
                    </div>
                     <br>
               </div>
                Team ShadowBreakers
            </div>
         </div>
      </footer>

      



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="js/init.js"></script>
  
  
  </body>
</html>


