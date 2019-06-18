<?php
session_start();
include_once("../../include/settings.php");
include_once("../../include/functions.php");
$user = new User();
    if(!isset($_SESSION['id'])) {
     header('location: ../../team_login.php'); exit;
    }
  $man_id=$_SESSION['id'];
$sql="SELECT * FROM `rosters` WHERE `man_id`='$man_id'";
$result=mysqli_query($con,$sql);
$limtQry = $user->getPagingQuery($sql, $rowsPerPage); /* for pagination */
$pagingLink = $user->getPagingLink($sql, $rowsPerPage, "view_rosters.php");
$user_list = $user->getRows($limtQry);
$i = 1;
if (isset($_GET['action']) == "delete" && $_GET['deleteid'] != "") {

    $id = $_GET['deleteid'];
    $del = $user->delet_record($table, "id", $id, "1");
    if ($del) {
        $_SESSION['success'] = "You successfully deleted record.";
        // echo "<script type='text/javascript'>window.location.href = 'view_rosters.php';</script>";
       header("location: view_rosters.php");
        exit;
    }
}
?>
<?php include_once("common/head.php");?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <?php include_once("common/profile_section.php"); ?>
</div><!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper" class="main-wrapper">
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $_SESSION['success'] ?>
            <?php
            unset($_SESSION['success']);
            unset($_SESSION['flag']);
            ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-xs-12 col-sm-2">
        	<?php include_once("common/left_sidebar.php");?>
        </div> 
        <div class="col-xs-12 col-sm-10">
                <?php 
                if (isset($_SESSION['success']) && $_SESSION['success'] != "") { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <?= $_SESSION['success'] ?>
                        <?php unset($_SESSION['success']); ?>
                        </div>
                    <?php } ?>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            <?= $_SESSION['error'] ?>
                        <?php unset($_SESSION['error']); ?>
                        </div>
                <?php } ?>

                <h3 class="text-center">Rosters List </h3>  
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <th class="text-center">ID</th>
                        <th class="text-center">Roster Name</th>
                        
                        <!-- <th class="text-center">State Director Name</th> -->
                        <!-- <th>Team Name</th>
                        <th>Sanction Id</th> -->
                        <th class="text-center">Division</th>
                        <th class="text-center">Class</th>   
                        <th class="text-center">Action</th>                           
                        <!-- <th colspan="2" class="text-center">Functions</th> -->
                         <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                         <td class="text-center"><?=$row['r_id'] ?></td>
                            <td class="text-center"><?=$row['roster_name'] ?></td>
                            
                            <!-- <td><?=$row['team_name'] ?></td>
                            <td><?=$row['sanction_id'] ?></td> -->
                            <td class="text-center"><?=$row['division'] ?></td>
                            <td class="text-center"><?=$row['class'] ?></td>
                            <td class="text-center"><a href="add_roster_players.php?id=<?=$row['r_id'];?>">ADD Players</a></td>
                            <!-- <td><a href="edit_player_sanction.php?id=<?php echo $row["id"]; ?>"> -->
                            	<!-- <button>Edit</button> -->
                            	<!-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="delete_player_sanction.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this record?');"> -->
                            	<!-- <button>Delete</button> -->
                            	<!-- <i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
                            
                        </tr>
                    <?php } ?>
                    </table>
                </div>
                        
            </div>
    </div>
</div>

<?php include_once("common/foot.php"); ?>        