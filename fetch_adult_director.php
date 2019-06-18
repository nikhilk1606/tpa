<?php
session_start();
include_once("include/settings.php");
     $state_id=$_POST['t_state'];
      $sql ="SELECT * FROM `adult_director` WHERE `state_id`=$state_id";
   	 $result=mysqli_query($con,$sql);
     while($row=mysqli_fetch_array($result)){ ?>
        <select name='director'>
        <option value="<?=$row['director_id']?>"><?=$row['director_name']?></option>
        </select>
     <?php } ?>