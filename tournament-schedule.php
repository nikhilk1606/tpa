<?php
session_start();
include_once("include/settings.php");


        $age_group=$_POST['age_group'];
        $season=$_POST['season'];
        $division=$_POST['division'];
        $class=$_POST['class'];
        $state=$_POST['state'];
        $s_date=date("Y-m-d",strtotime($_POST['txtstartdate']));
        $e_date=date("Y-m-d",strtotime($_POST['txtenddate']));
        $sql3 = "SELECT * FROM `states` WHERE `id`=$state";
        $result3=mysqli_query($con,$sql3);
        $row3=mysqli_fetch_array($result3);
        $state1=$row3['name'];
         $y=date("Y");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Tournament Schedule | TPA</title>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <!-- Custom Css End -->
    </head>
<body>

<?php  $page_name=basename($_SERVER['PHP_SELF']);?>
<?php
if(isset($_SESSION['id'])){
  include "header2.php";
}
else
{ include "header.php";
} ?>
<div class="home-slider">
    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/tournament-banner.jpg" alt="" title="">
                <div class="carousel-caption"> 
                    <h2 class="animate bounceInDown animated">Tournament Schedule</h2>
                    <h3 class="animate bounceInDown animated" style="animation-delay: 0.3s;">TPA</h3> 
                </div>
            </div>  
        </div> 
    </div>
</div>
<section class="tournament-1">
    <div class="container">
        <div class="col-xs-12 col-sm-12">
            <h3>Tournament Search</h3>
            <div class="box">
                <form class="box-1" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                                <h4>Age Group</h4>
                                <div class="b-1">
                                    <label class="radio-inline">
                                      <input type="radio" name="age_group" value="Adult"checked>Adult
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="age_group" value="Youth">Youth
                                    </label>
                                    
                                </div> 
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="b-2"> 
                                <h3>Season  <?echo $y;?></h3>
                                <select name="season"id="season" >
                                <option selected="selected" value="">Season</option>  
                                <option value="Jan,Feb,March Season">Jan,Feb,March Season</option>
                                <option value="April,May,June Season">April,May,June Season</option>
                                <option value="July,August,September Season">July,August,September Season</option>
                                <option value="October,November,December Season">October,November,December Season</option>
                                </select>
                            </div> 
                           
                           
                        </select>
                        </div>
                        <div class="row w-80">
                            <div class="col-xs-12 col-sm-12">
                                <div class="col-xs-12 col-sm-4">
                                 <div class="b-3">
                                    <select name="state" class="form-control" id="state"required>
                                            <option value="state">State/Region</option>
                                             <?php 
                                 $sql1 = "SELECT * FROM `states` WHERE `country_id`=231";
                                $result=mysqli_query($con,$sql1);
                                  while($row=mysqli_fetch_assoc($result)){?>
                                    <option value="<?=$row['id']?>"><?=$row['name']?></option> 
                                <?php } ?>                                    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="b-3">
                                        <select name="division" id=division class="form-control">
                                            <option selected="selected" value="">Division</option>
                                            <option value="men">Men</option>
                                            <option value="women">Women</option>
                                            <option value="coed">COED</option>                                  
                                            <option value="35+">35+</option>
                                            <option value="county">County/Community</option>
                                           
                                      </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4">
                                    <div class="b-3">
                                        <select name="class" id="class" class="form-control">
                                            <option selected="selected" value="">Class</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="Rec">Rec</option>
                                            <option value="upper">UPPER</option>
                                            <option value="lower">LOWER</option>         
                                        </select>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                        <div class="row w-80">
                            <div class="col-xs-12 col-sm-12 mt-20">
                                <div class="col-xs-12 col-sm-6">
                                <div class="form-group control-group">
                                    <label class="left-t">Start Date</label>
                                    <input name="txtstartdate" type="text" id="txtstartdate" class="form-control" placeholder="Start Date"readonly> 
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group control-group">
                                    <label class="left-t">End Date</label>
                                    <input name="txtenddate" type="text" id="txtenddate" class="form-control" placeholder="End Date"readonly> 
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <button class="btn btn-primary search-btn"name="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
</section>
<?php
if(isset($_POST['submit']))
{ 
        $sql6="SELECT * FROM `add_tournament_details` WHERE `age_group`='$age_group' AND ( `season`='$season' OR`state`='$state1' OR`division`='$division' OR`class`='$class' OR`start_date`='$s_date' OR`end_date`='$e_date')";
        $result6=mysqli_query($con,$sql6);
    }
    ?>  
<section class="tournament-table">    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Tournament Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Classes</th>
                            <th>Division</th>
                        </tr>
                        
                        <?php
                        while ($row6=mysqli_fetch_assoc($result6)) {
                            $t_id=$row6['tournament_id'];
                            ?>
                            <tr>
                            <td><a href="tournament_details.php?id=<?php echo $t_id;?>"><?=$row6['tournament_name'] ?></a></td>
                            <td><?=$row6['start_date'] ?></td>
                            <td><?=$row6['end_date'] ?></td>
                            <td><?=$row6['city'] ?></td>
                            <td><?=$row6['state'] ?></td>
                            <td><?=$row6['class'] ?></td>
                            <td><?=$row6['division'] ?></td>
                            </tr> 
                            <?php
                        }

                        ?>  
                        
                    </table>
                </div>
            </div>
        </div> 
    </div>
</section>

<?php //} ?>

<!-- <section class="map-bg">
    <div class="container">
        <div class="row bg-white">
            <button class="btn btn-primary search-btn">Show State Map</button>
                <div class="col-xs-12 col-sm-12">
                    <img src="images/tournament-map.jpg" class="img-responsive">
                </div>
            </div>
    </div>
</section> -->


<?php include "footer.php"; ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript">
 $("#txtstartdate").datepicker({
  minDate: 0,
  onSelect: function(date) {
    //alert("123");
    $("#txtenddate").datepicker('option', 'minDate', date);
  }
});

 $("#txtenddate").datepicker({});

</script>
                

