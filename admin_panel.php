<?php
session_start();
//$connection=mysqli_connect("localhost","root","","miniproject_faculty") or die("Unable to connect to the database!");
$connection=mysqli_connect("localhost","id918800_minip","minip","id918800_minip") or die("Unable to connect to the database!");
if(isset($_POST['Insert_CD']))
{
    $Course_Code=mysqli_real_escape_string($connection,$_POST['Course_Code']);
    $Course_Title=mysqli_real_escape_string($connection,$_POST['Course_Title']);
    $Syllabus=mysqli_real_escape_string($connection,$_POST['Syllabus']);

    $sql="INSERT INTO course_table (Course_Code,Course_Title,Syllabus) VALUES ('$Course_Code','$Course_Title','$Syllabus');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";
}
if(isset($_POST['Insert_BD']))
{
    $Branch_Code=mysqli_real_escape_string($connection,$_POST['Branch_Code']);
    $Branch_Name=mysqli_real_escape_string($connection,$_POST['Branch_Name']);
    $Department=mysqli_real_escape_string($connection,$_POST['Department']);

    $sql="INSERT INTO branch_table (Branch_Code,Branch_Name,Department) VALUES ('$Branch_Code','$Branch_Name','$Department');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";
    
}
if(isset($_POST['Insert_COD']))
{
    $Course_Code=mysqli_real_escape_string($connection,$_POST['Course_Code']);
    $Course_Outcome_Id=mysqli_real_escape_string($connection,$_POST['Course_Outcome_Id']);
    $Outcome_Description=mysqli_real_escape_string($connection,$_POST['Outcome_Description']);

    $sql="INSERT INTO course_outcome_table (Course_Code,Course_Outcome_Id,Outcome_Description) VALUES ('$Course_Code','$Course_Outcome_Id','$Outcome_Description');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";

}
if(isset($_POST['Insert_SD']))
{
    $Roll_No=mysqli_real_escape_string($connection,$_POST['Roll_No']);
    $Student_Name=mysqli_real_escape_string($connection,$_POST['Student_Name']);
    $Branch_Code=mysqli_real_escape_string($connection,$_POST['Branch_Code']);

    $sql="INSERT INTO student_table (Roll_No,Student_Name,Branch_Code) VALUES ('$Roll_No','$Student_Name','$Branch_Code');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";

}
if(isset($_POST['Insert_FD']))
{
    $Faculty_Id=mysqli_real_escape_string($connection,$_POST['Faculty_Id']);
    $Faculty_Name=mysqli_real_escape_string($connection,$_POST['Faculty_Name']);
    $Faculty_Qualification=mysqli_real_escape_string($connection,$_POST['Faculty_Qualification']);
    $Faculty_Designation=mysqli_real_escape_string($connection,$_POST['Faculty_Designation']);
    $Faculty_Specialization=mysqli_real_escape_string($connection,$_POST['Faculty_Specialization']);

    $sql="INSERT INTO faculty_table (Faculty_Id,Faculty_Name,Faculty_Qualification,Faculty_Designation,Faculty_Specialization) VALUES ('$Faculty_Id', '$Faculty_Name', '$Faculty_Qualification', '$Faculty_Designation', '$Faculty_Specialization');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";

}
if(isset($_POST['Insert_ED']))
{
    $Examination_Code=mysqli_real_escape_string($connection,$_POST['Examination_Code']);
    $Examination_Type=mysqli_real_escape_string($connection,$_POST['Examination_Type']);
    $Max_Marks=mysqli_real_escape_string($connection,$_POST['Max_Marks']);
    
    $sql="INSERT INTO examination_table (Examination_Code,Examination_Type,Max_Marks) VALUES ('$Examination_Code','$Examination_Type','$Max_Marks');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";
    
}
if(isset($_POST['Insert_SED']))
{
    $Course_Code=mysqli_real_escape_string($connection,$_POST['Course_Code']);
    $Examination_Code=mysqli_real_escape_string($connection,$_POST['Examination_Code']);
    $Roll_No=mysqli_real_escape_string($connection,$_POST['Roll_No']);
    $Course_Outcome_Id=mysqli_real_escape_string($connection,$_POST['Course_Outcome_Id']);
    
    $sql="INSERT INTO exam_questions_table (Course_Code,Examination_Code,Roll_No,Course_Outcome_Id) VALUES ('$Course_Code', '$Examination_Code', '$Roll_No', '$Course_Outcome_Id');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";
}
if(isset($_POST['Insert_SMD']))
{
    $Roll_No=mysqli_real_escape_string($connection,$_POST['Roll_No']);
    $Examination_Code=mysqli_real_escape_string($connection,$_POST['Examination_Code']);
    $Marks=mysqli_real_escape_string($connection,$_POST['Marks']);
    $Max_Marks=mysqli_real_escape_string($connection,$_POST['Max_Marks']);
    
    $sql="INSERT INTO exam_questions_table (Roll_No,Examination_Code,Marks,Max_Marks) VALUES ('$Roll_No', '$Examination_Code', '$Marks', '$Max_Marks');";
    mysqli_query($connection,$sql);
    $_SESSION['message']="You are now registered";
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
            <a id="logo-container" class="center" href="#" class="brand-logo"><img src="cvrlogo.png" width="130px"></a>
            <a id="logo-container" class="center" class="brand-logo">CVR COLLEGE OF ENGINEERING</a>
            <!--<a id="logo-container" class="center" class="brand-logo">CVR COLLEGE OF ENGINEERING</a>-->
            
         </div>
      </nav>
      <nav class="grey darken-4" role="navigation" style:"height:26px;">
         <div class="nav-wrapper container" style="height:26px;">
            <ul class="right hide-on-med-and-down">
                <li><a href="about.html" style="color:white">About</a></li>
               <li><a href="admin_panel.html" style="color:white">Admin Portal</a></li>
               <li><a href="logout.php" style="color:white">Logout</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="about.html" data-toggle="modal" data-target="#myModal">About</a></li>
               <li><a href="admin_panel.html">Admin Portal</a></li>
               <li><a href="logout.php">Logout</a></li>
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
  <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Course Details</h3>
        <br>
        <br>
        Update the Course details in the database.
        <div class="col-sm-12">
        <form action='' method="POST">    
        <input type="text" name="Course_Code" placeholder="Course Code">        
        <input type="text" name="Course_Title" placeholder="Course Title">
        <textarea rows="3" name="Syllabus" placeholder="Syllabus"></textarea>
        
        <br><br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_CD">
        <br></form>
        </div>
    </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Branch Details</h3>
        <br>
        <br>
        Update the Branch details in the database.
        <div class="col-sm-12">
        <form action='' method="POST">
        <input type="text" name="Branch_Code" placeholder="Branch Code: CSE/ECE/IT/EEE....">        
        <input type="text" name="Branch_Name" placeholder="Branch Name: CSE/ECE/IT/EEE....">
        <input type="text" name="Department" placeholder="Department">
        <br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_BD">
        <br>
    </form>
      </div>
    </div>
  </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Course Outcome Details</h3>
        <br>
        <br>
        Update the COs details in the database.
        <div class="col-sm-12">
        <form action="" method="POST">    
        <input type="text" name="Course_Code" placeholder="Course Code">        
        <input type="text" name="Course_Outcome_Id" placeholder="CO Id: CO1/CO2/CO3/CO4">
        <textarea rows="3" name="Outcome_Description" placeholder="Outcome Description"></textarea>
        <br><br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_COD">
        <br>
        </form>
        </div>
    </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Student Details</h3>
        <br>
        <br>
        Update the Student details in the database.
        <div class="col-sm-12">
        <form action="" method="POST">
        <input type="text" name="Roll_No" placeholder="Roll No">        
        <input type="text" name="Student_Name" placeholder="Student Name">
        <input type="text" name="Branch_Code" placeholder="Branch Code : CSE/ECE/IT...">
        <br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_SD">
        <br>
        </form>
        </div>
    </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Faculty Details</h3>
        <br>
        <br>
        Update the Faculty details in the database.
        <div class="col-sm-12">
        <form action="" method="POST">            
        <input type="text" name="Faculty_Id" placeholder="Faculty Id">        
        <input type="text" name="Faculty_Name" placeholder="Faculty Name">
        <input type="text" name="Faculty_Qualification" placeholder="Faculty Qualification">
        <input type="text" name="Faculty_Designation" placeholder="Faculty Designation">
        <input type="text" name="Faculty_Specialization" placeholder="Faculty Specialization">
        <br><br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_FD">
        <br></form>
        </div>
    </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Examination Details</h3>
        <br>
        <br>
        Update the Examination details in the database.
        <div class="col-sm-12">
        <form action="" method="POST">            
        <input type="text" name="Examination_Code" placeholder="Examination Code: CD001/MPMC002/WT_INT/WT_EXT">        
        <input type="text" name="Examination_Type" placeholder="Type : mid/sem ">
        <input type="text" name="Max_Marks" placeholder="Max Marks">
        <br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_ED">
        <br></form>
        </div>
    </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Student Exam Details</h3>
        <br>
        <br>
        Update the Student details and the corresponding CO achieved for the Course in the database.
        <div class="col-sm-12">
        <form action="" method="POST">            
        <input type="text" name="Course_Code" placeholder="Course Code">        
        <input type="text" name="Examination_Code" placeholder="Examination Code">
        <input type="text" name="Roll_No" placeholder="Roll No">
        <input type="text" name="Course_Outcome_Id" placeholder="Course Outcome Id">
        <br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_SED">
        <br></form>
        </div>
    </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Enter Student Mark Details</h3>
        <br>
        <br>
        Update the Student marks for the Course in the database.
        <div class="col-sm-12">
        <form action="" method="POST">            
        <input type="text" name="Roll_No" placeholder="Roll No">        
        <input type="text" name="Examination_Code" placeholder="Examination Code">
        <input type="text" name="Marks" placeholder="Marks">
        <input type="text" name="Max_Marks" placeholder="Max Marks">
        <br>
        <input type="submit" class="btn btn-primary" value="Insert" name="Insert_SMD">
        <br></form>
        </div>
    </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">See Reports</h3>
        <br>
        <br>
        <div class="col-sm-12">
        <form action="" method="POST">            
        <br>
        <a href="reports.php" class="btn btn-primary">Reports</a>
        <br></form>
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

      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
  
  </body>
</html>


