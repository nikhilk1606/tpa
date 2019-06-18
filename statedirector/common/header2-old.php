  <div id="main">
    <div class="container">
      <div id="header">
        <h1 id="logo"><a href="manage-doctors.php"><img src="images/logo.jpg" width="180" height="61" /></a></h1>
        <div id="admin_links"><?php if(isset($_SESSION['uid'])) { ?> 
        <a href="index.php"> Welcome
	<? $result2 = @mysql_query("SELECT fname  FROM users WHERE id = ".$_SESSION['uid']."");
        $user_data2 = @mysql_fetch_array($result2);
        echo $user_data2['fname']; ?>        
         </a> | <a href="logout.php">Sign Out</a> <?php } ?></div>
      </div>