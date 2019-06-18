  <div id="main">
    <div class="container">
      <div id="header">
        <h1 id="logo"><a href="#"><img src="images/logo.jpg" width="180" height="61" /></a></h1>
        <div id="admin_links"><?php if(isset($_SESSION['user_id'])) { ?> 
        <a href="index.php"> Welcome
	<? $result2 = @mysql_query("SELECT fname  FROM tbl_users WHERE user_id = ".$_SESSION['user_id']."");
        $user_data2 = @mysql_fetch_array($result2);
        echo $user_data2['fname']; ?>        
         </a> | <a href="../director/logout.php">Sign Out</a> <?php } ?></div>
      </div>