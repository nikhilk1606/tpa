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
        <title>Roster Add | The Players Association</title>
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

<section class="roster-add">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h3 class="text-center">Roster Add</h3>
                <form>
                    <div class="col-xs-12 col-sm-4"> 
                       <label>Team Name</label>
                       <input name="t-name" type="text" id="t-name" class="form-control pd-b-10"> 
                    </div>

                    <div class="col-xs-12 col-sm-4"> 
                       <label>Sanction Id</label>
                       <input name="sanction-id" type="text" id="sanction-id" class="form-control pd-b-10"> 
                    </div>

                    <div class="col-xs-12 col-sm-4"> 
                       <label>Division</label>
                       <input name="division" type="text" id="division" class="form-control pd-b-10"> 
                    </div>

                    <div class="col-xs-12 col-sm-4"> 
                       <label>Class</label>
                       <input name="class" type="text" id="class" class="form-control pd-b-10"> 
                    </div>

                    <div class="col-xs-12 col-sm-12 text-center">
                        <button class="btn btn-primary search-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</section>


<?php include "footer.php"; ?>