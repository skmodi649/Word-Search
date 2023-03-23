<?php

include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Word Search</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    

  </head>
  <body>
  <nav class=" navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">WordSearch</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#result">Results</a></li>
        <li class="nav-item"><a class="nav-link" href="#footer">About</a></li>
          </div>
        </div>
      </div>
    </nav>
  <div class="con contentcontainer" id="topContainer">

    <div class="row wrapper">
        <div class="col-md-6 col-md-offset-3" id="topRow">
          <h1 class="marginTop">WordSearch</h1>

          <p class="lead">This is the web interface for the Parallel Word Search.</p>

          <p>Openmp is the underlying technology</p>
          <p class="bold marginTop">Interested? Check it how awesome it is!</p>

          <form class="marginTop" action="display.php" method="GET">
            
            <div class="input-group">
              <!-- <span class="input-group-addon">=></span> -->
              <input type="text" placeholder="Search term goes here...." class="form-control" name="query" />
              </div>
              
              <input type="submit" class="btn btn-success btn-lg marginTop" value="Search"/>
            

          </form>

        </div>
    </div>
    
  </div>

  <div class="container contentContainer" id="result">
      <div class="row" class="center">
        <h1 class="center  title">Results</h1>
        

      </div>

<?php



$query = $_GET['query'];

 
        $raw_results = mysqli_query($con,"SELECT * FROM list
            WHERE string = '$query' ");

            if(mysqli_num_rows($raw_results)==0)
              echo "No Results Found";
            else
            {
              while($row=mysqli_fetch_array($raw_results)){


                       $a = $row['1'];
                       $b = $row['2'];
                       $c = $row['3'];
                       $d = $row['4'];
                       $e = $row['5'];

                       $arr2=array();

                       $arr = array("first.txt"=>$a,"second.txt"=>$b,"third.txt"=>$c,"fourth.txt"=>$d,"fifth.txt"=>$e);


                        arsort($arr);
                       foreach ($arr as $key => $value) {
            array_push($arr2, $key);
            array_push($arr2,$value);

}

?>

<div class="container">
  <center> <h2>Word Search</h2> </center>
              
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Rank</th>
        <th>Document</th>
        <th>Frequency</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td><?php echo $arr2[0];?></td>
        <td><?php echo $arr2[1];?></td>
      </tr>
      <tr>
        <td>2</td>
        <td><?php echo $arr2[2];?></td>
        <td><?php echo $arr2[3];?></td>
      </tr>
      <tr>
        <td>3</td>
        <td><?php echo $arr2[4];?></td>
        <td><?php echo $arr2[5];?></td>
      </tr>
      <tr>
        <td>4</td>
        <td><?php echo $arr2[6];?></td>
        <td><?php echo $arr2[7];?></td>
      </tr>
      <tr>
        <td>5</td>
        <td><?php echo $arr2[8];?></td>
        <td><?php echo $arr2[9];?></td>
      </tr>
    </tbody>
  </table>
</div>

<?php

              }
            }

?>      


  </div>


  <div class="con1" id="footer" >
    <div class="row" >
      <h1 class="center title">
      Git Hub Repository!!
        
      </h1>
      <p class="lead center">
      Made By:<br>
                1. Randhir Kumar Choudhary &nbsp;&nbsp;&nbsp; 20BCE0122<br>
                2. Suraj Kumar &nbsp;&nbsp;&nbsp; 20BCE2835
        
      </p>
     <center><h2><a href="https://github.com/skmodi649/Word-Search">Get code!</a></h2></center>
      <marquee behavior="scroll" direction="left" scrollamount="11">&copy; All rights reserved under Parallel and Distributed Computing Project 2023 !!</marquee>
    </div>


  </div>
  
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
      $(".contentContainer").css("min-height",$(window).height());
    </script>
  </body>
</html>