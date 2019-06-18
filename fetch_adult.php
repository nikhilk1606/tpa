<?php
session_start();
include_once("include/settings.php");
include_once("include/functions.php");
$user     = new User();

?>
      

<?php
           if(isset($_SESSION['message']) && $_SESSION['flag']==0)
           {
             ?>
             <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <?php echo $_SESSION['message']; ?>
             </div>
             <?php
           }
           else if(isset($_SESSION['message']) && $_SESSION['flag']==1)
           {
             ?>
               <div class="alert alert-success text-center">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <?php echo $_SESSION['message']; ?>
               </div>
               <?php
           }
      
           unset($_SESSION['message']);
           unset($_SESSION['flag']);
         ?>

<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" id="cform">
      <span>team registration details
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Season *</label>
            <select name="season" id="season" class="form-control">
              <option value="2019">2019</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>team Name *</label>
            <input type="text" name="tname" id="tname" class="form-control" placeholder="Team Name" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Division *</label>
            <select name="div" id="div" class="form-control">
              <option value="Men">Men</option>
              <option value="women">Women</option>
            </select>
        </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>program *</label>
            <select name="program" id="program" class="form-control">
              <option value="Adult slow">Adult Slow</option>
              <option value="Adult Fast">Adult Fast</option>
            </select>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>targeted class *</label>
            <select name="class" id="class" class="form-control">
              <option value="leage">leage</option>
              <option value="platinun">Platinum</option>
            </select>
        </div>
        </div>
      </div>
          <span>team contact info</span>
          <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Secondary contact Name *</label>
                    <input type="text" name="sec_name" class="form-control" placeholder="secondary contact Name" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Secondary Contact Phone *</label>
                    <input type="text" name="sec_phone" class="form-control" placeholder="Last Name" required>
                  </div>
                </div>
              </div>
         <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Secondary contact Email*</label>
                    <input type="email" name="sec_email" class="form-control" placeholder="Secondary Contact email" required>
                  </div>
                </div>
              </div>
              <span>Director Selection</span>
                <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Team State*</label>
                    <?php 
                     $sql1 = "SELECT * FROM `states` WHERE `country_id`=231";
                    $result=mysqli_query($con,$sql1);
                      while($row=mysqli_fetch_assoc($result)){?>
                        <option value="<?=$row['name']?>"><?=$row['name']?></option> 
                    <?php } ?> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>your Director *</label>
                    <input type="text" name="director" class="form-control" placeholder="director Name" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Comment </label>
                    <textarea name="comment"rows="4" cols="50"required></textarea>
                  </div>
                </div>
              </div>
      <div class="row">
        <div class="col-sm-12 text-center">
          <button class="btn" name="submit" value="submit">Register</button>
        </div> 
      </div>
    </form>
  </div>
</div>

 
            
      
        
        
