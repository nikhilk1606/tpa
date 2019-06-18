<?php
session_start();
include_once("../include/settings.php");


if (!isset($_SESSION['id'])) {
    header('location: admin_login.php');
    exit;
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
    <div class="col-xs-12 col-sm-10 box-border">
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
   
               
            <h3 class="text-center">View Tournaments</h3>
            <div class="table-responsive">
              <?php
               $sa="SELECT * FROM `add_tournament_details` WHERE 1";
              $rw=mysqli_query($con,$sa);
                ?>
              <table class="table table-bordered">
                  <th class="text-center">#</th> 
                  <th class="text-center">ID</th>  
                  <th class="text-center">Tournament Name</th>                             
                  <th class="text-center">Age Group</th>
                  <th class="text-center">Season</th>
                  
                  <th class="text-center">Action</th>
                  
                   
                   <?php while($sr = mysqli_fetch_assoc($rw)) { ?>
                  <tr>
                      
                          <td class="text-center" >
                              
                          </td>
                       <td class="text-center" ><?=$sr['tournament_id'] ?></td>
                      <td class="text-center" ><?=$sr['tournament_name'] ?></td>
                      <td class="text-center" ><?=$sr['age_group'] ?></td>
                      <td class="text-center" ><?=$sr['season'] ?></td>
                      <td class="text-center">
                        <a href="tournament.php?id=<?=$sr['tournament_id']?>"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
                        <a href="edit_tournament.php?id=<?=$sr["tournament_id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="delete_tournament.php?id=<?=$sr["tournament_id"] ?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                      

                  </tr>
              <?php } ?>
          
              </table>
         
          </div>
         
         
          </div>
        </div>
      </div>
  </div>

                    

   