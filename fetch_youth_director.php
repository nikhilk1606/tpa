<?php
session_start();
include_once("include/settings.php");
     $state_id=$_POST['t_state'];

      $sql9 ="SELECT * FROM `youth_director` WHERE `state_id`=$state_id";
   	 $result9=mysqli_query($con,$sql);
     while($row9=mysqli_fetch_array($result9)){ ?>
        <select name='director'required>
        <option value="<?=$row9['director_id']?>"><?=$row9['director_name']?></option>
        </select>
     <?php } ?>