<?php
session_start();
require_once 'includes/config.php';
include './header.php';
extract($_POST);
$date=date('Y-m-d H:i:s');
// print_r($date);
// die();
$sel_user="SELECT * FROM `tbl_users`";
$stmt3=$db->prepare($sel_user);
$stmt3->execute();
$res_user=$stmt3->fetchAll();
if(isset($_POST['submit']))
{
  $category=$category;
  $title=$blog_title;
  $btitle=addcslashes($title,"'");
  $blog_desc=$blog_desc;
  $fileName = $_FILES['img']['name'];
  $fileExistsFlag = 0;

   $bdesc=addcslashes($blog_desc,"'");
    $target = "../img/"; 
    $fileTarget = $target.$fileName; 
    $tempFileName = $_FILES["img"]["tmp_name"];
    $FileName = $_FILES["img"]["name"];
    
    $result = move_uploaded_file($tempFileName,$fileTarget);
   
    if($result) 
    { 
      $sql="INSERT INTO `tbl_blog`(`bcategory`,`btitle`,`bimg`,`descp`,`status`,`created_date`) VALUES ('$category', '$btitle','$fileName','$bdesc','1','$date')";
      $stmt = $db->prepare($sql);
      $res=$stmt->execute();
      $bid=$db->lastInsertId();
      if($res)
      {
        foreach ($res_user as $res_user) 
        {
          $to = $res_user['email'];
          $subject  = "New Blog Added";
          $message    = "";
          $message    = '';
          $message   .= "Dear User". $res_user['name']."<br>"; 
          $message   .= " <a href=http://tech599.com/~tech599/tech599.com/johnsub/menopause/v2/blog-details.php?id=".$bid.">Click here to view blog</a>";
          $message   .= "";
          $headers    = 'MIME-Version: 1.0' . "\r\n";
          $headers   .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
          $headers   .= "From: Menopause Pro.<mike111taylor@gmail.com>" . "\r\n";
          $headers   .= "X-Priority: 3\r\n";
          $headers   .= "X-Mailer: PHP". phpversion() ."\r\n";
          // echo $message;
          $respond=mail($to,$subject,$message,$headers);
        }
        if($respond OR $res)
        {
          $_SESSION['success']="Blog Added Successfully.";
          header("location:manage_blogs.php");
          exit();
        }
      }
    }
  else
  {
    $_SESSION['error']="Blog Added Successfully.";
    header("location:add_blogs.php");
        exit();
  }
}
$sel="SELECT * FROM `tbl_category`";
$stmt2 = $db->prepare($sel);
$stmt2->execute();
$result=$stmt2->fetchAll();

?>

<div class="row dashbody">
  <div class="col-sm-3">
    <?php include('menu.php');?>
  </div>
  <div class="col-sm-9">
    <ul class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active"> Blogs</li>
    </ul>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Add Blogs</h3>
      </div>
      <?php 

                    if (isset($_SESSION['success']) && $_SESSION['success'] != "") { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= $_SESSION['success'] ?>
                            <?php unset($_SESSION['success']); ?>
                            </div>
                        <?php } ?>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] != "") { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?= $_SESSION['error'] ?>
                            <?php unset($_SESSION['error']); ?>
                            </div>
                    <?php } ?> 
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="<? echo $_SERVER['PHP_SELF'];?>">
          <input type="hidden" name="mode" value="add_new" >
          <!--<input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >-->
          <fieldset>
          <div class="form-group">
            <label class="col-lg-4 control-label" for="username"><span class="required">*</span>Category Name:</label>
            <div class="col-lg-5">
            	<select class="form-control" name="category" id="category" required>
                <? 
                foreach ($result as $key ) {
               // print_r($key);
                ?>
               <option  value="<?=$key['cat_id']?>"> <?=$key['cat_name']?></option> 
                
                <? } ?>
                	<!-- <option value="Hormones and Menopause Treatments">Hormones and Menopause Treatments</option>
                	<option value="Vaginal Health and sex">Vaginal Health and sex</option>
                	<option value="Mood">Mood</option>
                	<option value="Gynecologic Issues">Gynecologic Issues</option>
                	<option value="General Health">General Health</option>
                	<option value="Supplements">Supplements</option>
                	<option value="Osteoporosis">Osteoporosis</option>
                	<option value="Breasts">Breasts</option>
                	<option value="Gynecologic cancers">Gynecologic cancers</option>
                	<option value="Diet and exercise">Diet and exercise</option>
                	<option value="Lifestyle, career, retirement, and the rest of your life">Lifestyle, career, retirement, and the rest of your life</option>
                	<option value="Newsfeed">Newsfeed</option> -->
                </select>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label" for="username"><span class="required">*</span>Blog Title:</label>
            <div class="col-lg-5">
              <input type="text" placeholder="Blog Title" id="blog_title" class="form-control" name="blog_title" required="required">
              <span id="subjectname_err" class="error"></span> </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-4 control-label" for="username"><span class="required">*</span>Image:</label>
            <div class="col-lg-5">
              <input type="file"  id="img" class="form-control" name="img" required="required">
              <span id="subjectname_err" class="error"></span> </div>
          </div>

          <div class="form-group">
            <label class="col-lg-4 control-label" for="username"><span class="required">*</span>Description:</label>
            <div class="col-lg-5">
              <textarea  id="blog_desc" class="form-control" name="blog_desc" required></textarea>
              <script>
                        CKEDITOR.replace( 'blog_desc' );
              </script>
 </div>
          </div>
          
          
          <div class="form-group">
            <div class="col-lg-5 col-lg-offset-4">
              <button class="btn btn-primary" name="submit" type="submit">Submit</button>
              <a href="manage_blogs.php">
              <button class="btn btn-primary" type="button">Back</button>
              </a> </div>
          </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<!-- <script type="text/javascript">

		jQuery(document).ready(function(){

		//form validation rules

		jQuery("#contact_form").validate({

		rules: {
		
		subjectcatid:{required: true },
		subjectname:{required: true},
		subjecttagline:{required: true},
		subjectshortdesc:{required: true},
		subjectdesc:{required: true}

		},

		messages: {
		
		subjectcatid:{required: "Please select category."},
		subjectname:{required: "Please enter subject name."},
		subjecttagline:{required: "Please enter subject tag line."},
		subjectshortdesc:{required: "Please enter subject short description."},
		subjectdesc:{required: "Please enter subject description."}
		
		},

		submitHandler: function(form) {

		form.submit();

		}

		});

	});

</script> -->
<?php
include './footer.php';
?>

