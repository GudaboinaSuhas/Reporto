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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
   
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
        To get the count of questions per CO ID<br>
        <div class="col-sm-12">    
        <form action="" method="POST">
                            <br>Course Code<input type="text" name="Course_Code" placeholder="12CS302CV">
                            Examination Code<input type="text" name="Examination_Code" placeholder="CD001/WT002">
                         
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
                    
                    $sql = "SELECT Course_Outcome_Id,COUNT(Q_ID) as Count FROM `questions_table` 
                            where Course_Code='$Course_Code' and Examination_Code='$Examination_Code' 
                            GROUP BY Course_Outcome_Id";
                    $query = mysqli_query($connection, $sql);
                echo '<table border="1">
                    <thead>
                        <tr>
                            <th>Course Outcome Id</th>
                            <th>Count of Questions</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($row = mysqli_fetch_array($query))
                    {
                    $array[]=$row['Count'];    
                    echo '<tr>
                            <td>'.$row['Course_Outcome_Id'].'</td>
                            <td>'.$row['Count'].'</td>
                        </tr>';
                    }
                    echo '
                    </tbody>
                    </table>';
                    //echo json_encode($array);
                    //echo $array[0];
                mysqli_free_result($query);
                }
                if(isset($_POST['GenerateE']))
                {
                    $Course_Code=mysqli_real_escape_string($connection,$_POST['Course_Code']);
                    $Examination_Code=mysqli_real_escape_string($connection,$_POST['Examination_Code']);
                    
                    $sql = "SELECT Q_ID,COUNT(Q_ID) as Count,sum(Marks_Obtained) as Marks,
                            sum(Total) as Total,Course_Outcome_Id FROM `questions_mapping`
                            where Course_Code='$Course_Code' and Examination_Code='$Examination_Code'   
                            GROUP BY Q_ID";
                    $query = mysqli_query($connection, $sql);
                echo '<table border="1">
                    <thead>
                        <tr>
                            <th>Question ID</th>
                            <th>Students(attempted)</th>
                            <th>Marks Obtained</th>
                            <th>Total</th>
                            <th>Course Outcome Id</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while ($row = mysqli_fetch_array($query))
                    {
                    echo '<tr>
                            <td>'.$row['Q_ID'].'</td>
                            <td>'.$row['Count'].'</td>
                            <td>'.$row['Marks'].'</td>
                            <td>'.$row['Total'].'</td>
                            <td>'.$row['Course_Outcome_Id'].'</td>
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
        To get the count and marks obtained by the students per each question in an exam. <br>
        <div class="col-sm-12">    
        <form action="" method="POST">
                            <br>
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
        
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['CO 1', <?php echo $array[0]; ?>],
          ['CO 2', <?php echo $array[1]; ?>],
          ['CO 3', <?php echo $array[2]; ?>],
          ['CO 4', <?php echo $array[3]; ?>],
        ]);

        // Set chart options
        var options = {'title':'Count of Questions per CO',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <?php
        if(isset($_POST['Generate']))
                {
                    $Course_Code=mysqli_real_escape_string($connection,$_POST['Course_Code']);
                    $Examination_Code=mysqli_real_escape_string($connection,$_POST['Examination_Code']);
                    
                    $sql = "SELECT Q_ID,COUNT(Q_ID) as Count,sum(Marks_Obtained) as Marks, sum(Total) as Total,Course_Outcome_Id 
                            FROM `questions_mapping` where Course_Code='$Course_Code' and 
                            Examination_Code='$Examination_Code' GROUP BY Course_Outcome_Id";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($query))
                    {
                    $array1[]=$row['Total'];    
                    }
                    //echo json_encode($array);
                    //echo $array[0];
                mysqli_free_result($query);
                }
    ?>
    <div class="row">
    <div id="chart_div" class="col-md-4"></div>

    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['CO 1', <?php echo $array1[0]; ?>],
          ['CO 2', <?php echo $array1[1]; ?>],
          ['CO 3', <?php echo $array1[2]; ?>],
          ['CO 4', <?php echo $array1[3]; ?>],
        ]);

        // Set chart options
        var options = {'title':'Max Marks per CO',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
    <div id="chart_div2" class="col-md-4"></div>
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