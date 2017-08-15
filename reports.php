<?php
session_start();
//$connection=mysqli_connect("localhost","root","","miniproject_faculty") or die("Unable to connect to the database!");
$connection=mysqli_connect("localhost","id918800_minip","minip","id918800_minip") or die("Unable to connect to the database!");
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
                <li><a href="about.html">About</a></li>
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
        <h3 class="card-title">Generate table</h3>
        <br>
        Select the course and the outcomes ids to get the list of students who successfully achieved those outcomes.<br>
        <div class="col-sm-12">    
        <form action="" method="POST">
                            <br>Course Code<input type="text" name="Course_Code" placeholder="12CS302CV">
                            Examination Code<input type="text" name="Examination_Code" placeholder="CD001/WT002">
                            Course Outcome Id<input type="text" name="Course_Outcome_Id" placeholder="CO1/CO2/CO3/CO4">
                         
        <br><br>
        <input type="submit" class="btn btn-primary" value="Generate" name="Generate">
        <br></form>
        </div>
    </div>
    </div>
    
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-block">
            <h3 class="card-title">Reports & Analysis of Students</h3>
            <br>
            <br>
            <?php 
                

                if(isset($_POST['Generate']))
                {
                    $Course_Code=mysqli_real_escape_string($connection,$_POST['Course_Code']);
                    $Examination_Code=mysqli_real_escape_string($connection,$_POST['Examination_Code']);
                    $Course_Outcome_Id=mysqli_real_escape_string($connection,$_POST['Course_Outcome_Id']);
                    
                    
                    $sql = "select DISTINCT Roll_No,Examination_Code,Course_Outcome_Id from exam_questions_table WHERE Course_Code='$Course_Code' AND Examination_Code like '$Examination_Code' AND Course_Outcome_Id like '$Course_Outcome_Id'";
                    $query = mysqli_query($connection, $sql);
                echo '<table border="1">
                    <thead>
                        <tr>
                            <th>Roll_No</th>
                            <th>Examination_Code</th>
                            <th>Course_Outcome_Id</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($row = mysqli_fetch_array($query))
                    {
                    echo '<tr>
                            <td>'.$row['Roll_No'].'</td>
                            <td>'.$row['Examination_Code'].'</td>
                            <td>'.$row['Course_Outcome_Id'].'</td>
                        </tr>';
                    }
                    echo '
                    </tbody>
                    </table>';
                mysqli_free_result($query);
                }
                if(isset($_POST['GenerateE']))
                {
                    $Roll_No=mysqli_real_escape_string($connection,$_POST['Roll_No']);
                    $Course_Code=mysqli_real_escape_string($connection,$_POST['Course_Code']);
                    $Examination_Code=mysqli_real_escape_string($connection,$_POST['Examination_Code']);
                    
                    
                    
                    
                    $sql = "SELECT exam_questions_table.Roll_No,exam_questions_table.Course_Code,
                            exam_questions_table.Examination_Code,exam_questions_table.Course_Outcome_Id,
                            student_marks.Marks,student_marks.Max_Marks FROM exam_questions_table 
                            INNER JOIN student_marks ON exam_questions_table.Roll_No=student_marks.Roll_No AND 
                            exam_questions_table.Examination_Code=student_marks.Examination_Code WHERE 
                            exam_questions_table.Course_Code like '$Course_Code' AND 
                            exam_questions_table.Examination_Code like '$Examination_Code' AND
                            exam_questions_table.Roll_No='$Roll_No'
                            ORDER BY student_marks.Marks";
                    $query = mysqli_query($connection, $sql);
                echo '<table border="1">
                    <thead>
                        <tr>
                            <th>Roll_No</th>
                            <th>Examination_Code</th>
                            <th>Course_Outcome_Id</th>
                            <th>Marks</th>
                            <th>Max Marks</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($row = mysqli_fetch_array($query))
                    {
                    echo '<tr>
                            <td>'.$row['Roll_No'].'</td>
                            <td>'.$row['Examination_Code'].'</td>
                            <td>'.$row['Course_Outcome_Id'].'</td>
                            <td>'.$row['Marks'].'</td>
                            <td>'.$row['Max_Marks'].'</td>
                        </tr>';
                    }
                    echo '
                    </tbody>
                    </table>';
                mysqli_free_result($query);
                }
            ?>
        
        </div>
      </div>
      </div>
        <div class="col-sm-3">
    <div class="card">
      <div class="card-block">
        <h3 class="card-title">Generate table</h3>
        <br>
        Generate report of the selected student.
        To see the result specific to a course and exam type enter its Course Code and Examination Code<br>
        Otherwise please enter '%' to see the overall result<br>
        <div class="col-sm-12">    
        <form action="" method="POST">
                            <br>
                            Roll No<input type="text" name="Roll_No" placeholder="14B81A05R7">
                            Course Code<input type="text" name="Course_Code" placeholder="12CS302CV">
                            Examination Code<input type="text" name="Examination_Code" placeholder="CD001/WT002">
                         
        <br><br>
        <input type="submit" class="btn btn-primary" value="Generate" name="GenerateE">
        <br></form>
        </div>
    </div>
    </div>
    
  </div>
        <br><br>
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