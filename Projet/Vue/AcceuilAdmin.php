
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Library</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>
<?php
include "./navbar.php";
?>
<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading"><a href="addLiv.php" style="color:black;">Add/MODIFY/RETURN BOOKs</a></div>
        <div class="panel-body"><img src="../others/aa.png" class="img-responsive" style="width:100%" alt="Image"></div>
    
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href="empruntAdm.php" style="color:black;">GERER EMPRUNT</a></div>
        <div class="panel-body"><img src="../others/m.png" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
    </div>
    
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href="livreAdmin.php" style="color:black;">SEARCH/DELETE BOOK</a></div>
        <div class="panel-body"><img src="../others/rl2.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
  <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href="add_mod_adh.php" style="color:black;">Add/MODIFY ADHERANT</a></div>
        <div class="panel-body"><img src="../others/ap3.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href="searchEmprunt.php" style="color:black;">SEARCH EMPRUNT</a></div>
        <div class="panel-body"><img src="../others/m.png" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-default">
        <div class="panel-heading"><a href="searchAdh.php" style="color:black;">SEARCH/DELETE  ADHERANT</a></div>
        <div class="panel-body"><img src="../others/sA.avif" class="img-responsive" style="width:100%" alt="Image"></div>
        
      </div>
    </div>
  </div>
  </div>

</body>
</html>
