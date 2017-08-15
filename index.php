<?php

session_start();
$connection=mysqli_connect("localhost","id918800_minip","minip","id918800_minip") or die("Unable to connect to the database!");
//$connection=mysqli_connect("localhost","root","","miniproject_faculty") or die("Unable to connect to the database!");
if(isset($_POST['login']))
{
    $username=mysqli_real_escape_string($connection,$_POST['username']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $select_user="select * from faculty where username='$username' and password='$password'";
    $run_user=mysqli_query($connection,$select_user);
    $check=mysqli_num_rows($run_user);
    if($check==1){
        $_SESSION['message']="You're now logged in!";
        header('location:admin_panel.php');
    }
    else{
        $_SESSION['message']="Username/Password is incorrect!";
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
            <a id="logo-container" class="center" href="index.html" class="brand-logo"><img src="cvrlogo.png" width="130px"></a>
            <a id="logo-container" class="center" class="brand-logo">CVR COLLEGE OF ENGINEERING</a>
            <!--<a id="logo-container" class="center" class="brand-logo">CVR COLLEGE OF ENGINEERING</a>-->
            
         </div>
      </nav>
      <nav class="grey darken-4" role="navigation" style:"height:26px;">
         <div class="nav-wrapper container" style="height:26px;">
            <ul class="right hide-on-med-and-down">
                <li><a href="about.html" style="color:white">About</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="about.html" data-toggle="modal" data-target="#myModal">About</a></li>
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
  <div class="col-sm-9">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Web Application for generating Course Outcome Data Analysis and report of Students' performance </h3>
        <br><h6>About the project:</h6>
        <br>
        This Web Application Project involves following activities:
        <ol>
             <li>Literature Survey on Course Outcomes evaluation methods and techniques.</li>
             <li>Design of database to store data about students performance in examinations and faculty.</li>
             <li>Web Interface design and development to capture the data.</li>
             <li>Querying and computation of different static for course outcome analysis.</li>
             <li>Generation of reports and analysis.</li>
        </ol>
        <br>
    </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Admin Login</h3>
        <p class="card-text">
            <form action='' method="post">
                Username:<input type="text" class="form-control" name="username">
                
                Password:<input type="password" class="form-control" name="password">
                </p>
                <input type="submit" class="btn btn-primary" value="Login" name="login">
                <a href="registration.php" class="btn btn-primary">Register</a> <br>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Account Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        Username:<input type="text" name="username">
                        Email id:<input type="text" name="email">
                        Password:<input type="password" name="password">
                        Repeat Pasword:<input type="password" name="rpassword">
                        Mobile Number:<input type="text" name="mobile">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
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

      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
  
  </body>
</html>

