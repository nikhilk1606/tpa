<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Roster | The Players Association</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
    
    <!-- Bootstrap Css Start -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Bootstrap Css End -->
    
    <!-- Custom Css Start -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/media.css">
        <link rel="stylesheet" href="css/font-awesome.css"/>
    <!-- Custom Css End -->
    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['user_id'])){
  include "header2.php";
}
else
{ include "header.php";
} ?>

<section class="roster-1">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h3><a href="#">Players</a> | <a href="#">Coaches</a></h3>
                <table class="table table-responsive table-hover table-bordered roster-table r-table"> 
                    <thead>
                        <tr>
                            <th>Team Name</th>
                            <th>Sanction ID</th>   
                            <th>Division</th>
                            <th>Class</th>
                        </tr>
                    </thead> 
                    <tr class="col-2">
                       <td align="center">1</td>
                       <td align="center"><img src="images/roster1.png" class="img-responsive"></td>
                       <td align="center">George Porter</td>
                       <td align="center">F</td>
                   </tr>
                   <tr class="col-2">
                       <td align="center">2</td>
                       <td align="center"><img src="images/roster2.png" class="img-responsive"></td>
                       <td align="center">Emma Porter</td>
                       <td align="center">M</td>
                   </tr>
                   <tr class="col-2">
                       <td align="center">3</td>
                       <td align="center"><img src="images/roster3.png" class="img-responsive"></td>
                       <td align="center">Beckham Blake</td>
                       <td align="center">D</td>
                   </tr>
                   <tr class="col-2">
                       <td align="center">4</td>
                       <td align="center"><img src="images/roster4.png" class="img-responsive"></td>
                       <td align="center">George Porter</td>
                       <td align="center">F</td>
                   </tr>
                   <tr class="col-2">
                       <td align="center">5</td>
                       <td align="center"><img src="images/roster5.png" class="img-responsive"></td>
                       <td align="center">Corbin Jacob</td>
                       <td align="center">M</td>
                   </tr>
                </table>
            </div>
        </div>
        <!-- <div class="row r-table">
            <div class="col-xs-12 col-sm-8 roster-table">
                <div class="col-xs-12 col-sm-2 tab1">
                    <h3>Number</h3>
                </div>
                <div class="col-xs-12 col-sm-2 tab1">
                    <h3>Photo</h3>
                </div>
                <div class="col-xs-12 col-sm-6 tab1">
                    <h3>Name</h3>
                </div>
                <div class="col-xs-12 col-sm-2 tab1">
                    <h3>Position</h3>
                </div>
            </div>
        </div>
        <div class="row r-table">
            <div class="col-xs-12 col-sm-8 col-2">
                <div class="col-xs-12 col-sm-2 tab2">
                    <h4>1</h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <img src="images/roster1.png" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-6 tab2">
                   <h4>George Porter </h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <h4>F </h4>
                </div>
            </div>
        </div>
        <div class="row r-table">
            <div class="col-xs-12 col-sm-8 col-2">
                <div class="col-xs-12 col-sm-2 tab2">
                    <h4>2</h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <img src="images/roster2.png" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-6 tab2">
                   <h4>Emma Porter </h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <h4>M </h4>
                </div>
            </div>
        </div>
        <div class="row r-table">
            <div class="col-xs-12 col-sm-8 col-2">
                <div class="col-xs-12 col-sm-2 tab2">
                    <h4>3</h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <img src="images/roster3.png" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-6 tab2">
                   <h4>Beckham Blake </h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <h4>D </h4>
                </div>
            </div>
        </div>
        <div class="row r-table">
            <div class="col-xs-12 col-sm-8 col-2">
                <div class="col-xs-12 col-sm-2 tab2">
                    <h4>4</h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <img src="images/roster4.png" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-6 tab2">
                   <h4>George Porter </h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <h4>F </h4>
                </div>
            </div>
        </div>
        <div class="row r-table">
            <div class="col-xs-12 col-sm-8 col-2">
                <div class="col-xs-12 col-sm-2 tab2">
                    <h4>5</h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <img src="images/roster5.png" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-6 tab2">
                   <h4>Corbin Jacob </h4>
                </div>
                <div class="col-xs-12 col-sm-2 tab2">
                   <h4>M </h4>
                </div>
            </div>
        </div> -->
    </div>
</section>

<?php include "footer.php"; ?>