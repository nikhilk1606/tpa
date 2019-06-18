<?php
session_start();
include_once("../include/settings.php");
include_once("../include/functions.php");
$user       = new User();
$player_id=$_POST['player_id'];
$team_id=$_POST['team_id'];
$umpire_id=$_POST['umpire_id'];
if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
}
?>
<?php
if(isset($_POST['restore_player'])){
  $sq="SELECT `del_status` FROM `player_sanction` WHERE `player_id`='$player_id'";
  $re=mysqli_query($con,$sq);
  while($r=mysqli_fetch_assoc($re)){
    $de_pl=$r['del_status'];
    if($de_pl=='1'){
  
    $sql="UPDATE `player_sanction` SET `del_status`='0' WHERE `player_id`='$player_id'";
    $result=mysqli_query($con,$sql);
     }
  }
 if($result){
  $_SESSION['success']="Restore Player Successfully";
  header("location:restore_users.php");
  exit;
 }
 else {
   $_SESSION['error']="Please enter valid player sanction ID";
  header("location:restore_users.php");
  exit;
 }
 }
 if(isset($_POST['restore_team'])){
  $s="SELECT `del_status` FROM `team_sanction` WHERE `team_id`='$team_id'";
  $rs=mysqli_query($con,$s);
  while($r1=mysqli_fetch_assoc($rs)){
     $de_tm=$r1['del_status'];
    if ($de_tm=='1') {
      $sql1="UPDATE `team_sanction` SET `del_status`='0' WHERE `team_id`='$team_id'";
      $result1=mysqli_query($con,$sql1);
    }
  }
 if($result1){
  $_SESSION['success']="Restore Team Successfully";
  header("location:restore_users.php");
  exit();
 }
 else {
   $_SESSION['error']="Please enter valid Team sanction ID";
  header("location:restore_users.php");
  exit;
 }
}
if(isset($_POST['restore_umpire'])){
   $s1="SELECT `del_status` FROM `umpire_sanction` WHERE `umpire_id`='$umpire_id'";
  $r2=mysqli_query($con,$s1);
  while ($r3=mysqli_fetch_assoc($r2)) {
    $de_um=$r3['del_status'];
    if($de_um=='1'){
      $sql2="UPDATE `umpire_sanction` SET `del_status`='0' WHERE `umpire_id`='$umpire_id'";
      $result2=mysqli_query($con,$sql2);
    }
  } 
 if($result2){
  $_SESSION['success']="Restore Umpire Successfully";
  header("location:restore_users.php");
  exit();
 }
 else {
   $_SESSION['error']="Please enter valid Umpire sanction ID";
  header("location:restore_users.php");
  exit;
 }
} 
?>
<?php include_once("../common/header.php"); ?>

<div id="page-wrapper">
<div class="add-product">
  <div class="row">
    <div class="col-xs-12 col-sm-12">
      <?php include_once("../common/profile_section.php"); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-2">
      <div class="collapse navbar-collapse navbar-ex1-collapse">
          <?php include_once("../common/left_sidebar.php"); ?>
      </div>
    </div>
    <div class="col-xs-12 col-sm-10 ">
      <?php if(isset($_SESSION['success']) && $_SESSION['success']!= ""){?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?=$_SESSION['success']?>
            <?php unset($_SESSION['success']);?>
        </div>
        <?php }?>
        <?php if(isset($_SESSION['error']) && $_SESSION['error']!= ""){?>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?=$_SESSION['error']?>
            <?php unset($_SESSION['error']);?>
        </div>
        <?php }?>
        <div class=" ">
      <!-- <form class="dualwindow_left" id="r_player" method="POST" novalidate="novalidate" >
        <div class="form-group col-sm-6 wow fadeInUp delay4" style="visibility: visible; animation-name: fadeInUp;">
          <label>Player Sanction ID</label>
          <input type="text" name="player_id" class="form-control str" placeholder="Player Sanction ID" >
        </div>
       
         <button type="submit" name="restore_player" class="btn btn-primary search-btn">SUBMIT</button>
      </form>
   
       <form class="dualwindow_left" id="r_team" method="POST" novalidate="novalidate" >
        <div class="form-group col-sm-6 wow fadeInUp delay4" style="visibility: visible; animation-name: fadeInUp;">
          <label>Team Sanction ID</label>
          <input type="text" name="team_id" class="form-control str" placeholder="Team Sanction ID" >
        </div>
       
         <button type="submit" name="restore_team" class="btn btn-primary search-btn">SUBMIT</button>
      </form>
    
       <form class="dualwindow_left" id="r_umpire" method="POST" novalidate="novalidate" >
        <div class="form-group col-sm-6 wow fadeInUp delay4" style="visibility: visible; animation-name: fadeInUp;">
          <label>Umpire Sanction ID</label>
          <input type="text" name="umpire_id" class="form-control str" placeholder="Umpire Sanction ID" >
        </div>
       
         <button type="submit" name="restore_umpire" class="btn btn-primary search-btn">SUBMIT</button>
      </form> -->

    </div>
   </div>
  </div>
</div>   

<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-2 box-border">                 
                          <h3 class="text-center">Deleted Sanction Players</h3>
                          <div class="table-responsive">
                            <?php
                            $sa="SELECT * FROM `player_sanction` WHERE `del_status`='1'";
                            $rw=mysqli_query($con,$sa);
                              ?>
                            <table class="table table-bordered">
                                <th class="text-center">#</th> 
                                <th class="text-center">ID</th>                               
                                <th class="text-center">Player First Name</th>
                                <th class="text-center">Player Last Name</th>
                                <th class="text-center">Player Sanction ID</th>
                                <th class="text-center">Action</th>
                                
                                 
                                 <?php while($sr = mysqli_fetch_assoc($rw)) { ?>
                                <tr>
                                    
                                        <td class="text-center" >
                                            
                                        </td>
                                     <td class="text-center" ><?=$sr['id'] ?></td>
                                    <td class="text-center" ><?=$sr['first_name'] ?></td>
                                    <td class="text-center" ><?=$sr['last_name'] ?></td>
                                    <td class="text-center" ><?=$sr['player_id'] ?></td>
                                    <td class="text-center"><a href="restore_players.php?id=<?=$sr['player_id']?>">Restore Player</a></td>

                                    

                                </tr>
                            <?php } ?>
                        
                            </table>
                       
                        </div>
                        <hr>

                        <h3 class="text-center">Deleted Sanction Teams</h3>
                          <div class="table-responsive">
                            <?php
                            $sa1="SELECT * FROM `team_sanction` WHERE `del_status`='1'";
                            $rw1=mysqli_query($con,$sa1);
                              ?>
                            <table class="table table-bordered">
                                <th class="text-center">#</th> 
                                <th class="text-center">ID</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>                               
                                <th class="text-center">Team Name</th>
                                <th class="text-center">Team Sanction ID</th>
                                <th class="text-center">Action</th>
                                 <?php while($sr1 = mysqli_fetch_assoc($rw1)) { ?>
                                <tr><td class="text-center" >   
                                        </td>
                                     <td class="text-center" ><?=$sr1['id'] ?></td>
                                    <td class="text-center" ><?=$sr1['first_name'] ?></td>
                                    <td class="text-center" ><?=$sr1['last_name'] ?></td> 
                                    <td class="text-center" ><?=$sr1['team_name'] ?></td>
                                    <td class="text-center" ><?=$sr1['team_id'] ?></td>
                                    <td class="text-center"><a href="restore_teams.php?id=<?=$sr1['team_id']?>">Restore Team</a></td>
                                  </tr>
                            <?php } ?>
                            </table>
                       
                        </div>

                        <hr>
                        <h3 class="text-center">Deleted Sanction Umpires</h3>
                          <div class="table-responsive">
                            <?php
                            $sa2="SELECT * FROM `umpire_sanction` WHERE `del_status`='1'";
                            $rw2=mysqli_query($con,$sa2);
                              ?>
                            <table class="table table-bordered">
                                <th class="text-center">#</th> 
                                <th class="text-center">ID</th>                               
                                <th class="text-center">Umpire First Name</th>
                                <th class="text-center">Umpire Last Name</th>
                                <th class="text-center">Umpire Sanction ID</th>
                                <th class="text-center">Action</th>
                                
                                 
                                 <?php while($sr2 = mysqli_fetch_assoc($rw2)) { ?>
                                <tr>
                                    
                                        <td class="text-center" >
                                            
                                        </td>
                                     <td class="text-center" ><?=$sr2['id'] ?></td>
                                    <td class="text-center" ><?=$sr2['first_name'] ?></td>
                                    <td class="text-center" ><?=$sr2['last_name'] ?></td>
                                    <td class="text-center" ><?=$sr2['umpire_id'] ?></td>
                                    <td class="text-center"><a href="restore_umpires.php?id=<?=$sr2['umpire_id']?>">Restore Umpire</a></td>                                

                                    

                                </tr>
                            <?php } ?>
                        
                            </table>
                       
                        </div>
                      </div>
                    </div>
</div>

<script>
    $(document).ready(function () {
        $("#r_player").validate({
            rules: {
                player_id: {required: true
                   
                }
                
            },
            highlight: function (element) {
                $(element).closest('.r_player').removeClass('success').addClass('error');
            },
            messages: {
                player_id: {
                    required: "Please enter Player Sanction ID."
                    
                },                
            }
        });

    });

</script>
<script>
    $(document).ready(function () {
        $("#r_team").validate({
            rules: {
                team_id: {required: true
                   
                }
                
            },
            highlight: function (element) {
                $(element).closest('.r_team').removeClass('success').addClass('error');
            },
            messages: {
                team_id: {
                    required: "Please enter Team Sanction ID."
                    
                },                
            }
        });

    });

</script>
<script>
    $(document).ready(function () {
        $("#r_umpire").validate({
            rules: {
                umpire_id: {required: true
                   
                }
                
            },
            highlight: function (element) {
                $(element).closest('.r_umpire').removeClass('success').addClass('error');
            },
            messages: {
                umpire_id: {
                    required: "Please enter Umpire Sanction ID."
                    
                },                
            }
        });

    });

</script>