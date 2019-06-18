<?php
class User {
public function __construct() 
{
        $db = new DB_Class();
}  
	public function insert_records($table,$data,$print='0') 
	{
			// build query...
	   $sql  = "INSERT INTO ".$table."";
	   // implode keys of $array...
	   $sql .= " (`".implode("`, `", array_keys($data))."`)";
	   // implode values of $array...
	   $sql .= " VALUES ('".implode("', '", $data)."') ";
	   // execute query...
	   if($print == '1')
	   {
			$sql;
	   }
	   //echo $sql; die;
	   
	   $result = mysql_query($sql);
	   return mysql_insert_id();
	}
	
    public function check_login($email_user, $password) 
	{
     
		$query = "SELECT user_id,full_name,phone,address,city,state,email  FROM `tbl_user` WHERE `email` = '{$email_user}' AND `password` = '{$password}'";
		$sql_user = @mysql_query($query);
		$sql_user_numrows = mysql_num_rows($sql_user);
		
		if($sql_user_numrows > 0){
			$current_user = mysql_fetch_assoc($sql_user);
			$_SESSION['current_user_id'] = $current_user['user_id'];
			$_SESSION['current_user'] = $current_user;
			return $current_user;
		}else{
			return false;	
		}
    }
	
	public function generateRandomString() {
		$chars = array_merge(range('a', 'z'), range(0, 9));
		shuffle($chars);
		$str =  implode(array_slice($chars, 0,5));
		$finalstr =  strtoupper($str);
		
     	$query = "SELECT *  FROM `user_service` WHERE `work_order` = '{$finalstr}'";
		$sql_str = @mysql_query($query);
		$sql_str_numrows = mysql_num_rows($sql_str);
		if($sql_str_numrows > 0) {  //present in database.
				$this->generateRandomString();
		}else{
				return $finalstr;
		}
	}
	
	public function check_active_login($email_user, $password) 
	{
     
		$query = "SELECT *  FROM `tbl_user` WHERE `email` = '{$email_user}' AND `password` = '{$password}'";	
		
		$sql_user = @mysql_query($query);
		$current_user = mysql_fetch_assoc($sql_user);
		
		if($current_user['is_active']  == 1){
			return true;
		}else{
			return false;	
		}
        
    }	
    public function getfullname($uid) 
	{
        $result = @mysql_query("SELECT full_name FROM tbl_user WHERE user_id = $uid");
        $user_data = @mysql_fetch_array($result);
        return $user_data['full_name'];
    }
  
    public function get_session() 
	{
	    
        return $_SESSION['login'];
    }
    public function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
	
	public function delmultiple($table,$ids)
	{
	 $sql=mysql_query("delete from ".$table." where id IN(".$ids.")");
	  return $sql;
	}
	
	public function delet_record($table,$field,$fiels_value)
	{
		$querystring = "delete from ".$table." where ".$field."='".$fiels_value."'";				
	  	$result = mysql_query($querystring);
	   return $result;
	}
	
	function Update_Dynamic_Query($TableName,$ValueArray,$FieldArray,$Field,$Id)
	{
	    $CountField = count($FieldArray);
	    $CountValue = count($ValueArray);
		if($CountField == $CountValue)	
		{
		    $sql = "update `$TableName` set ";
			
		    for($fi=0;$fi<$CountField;$fi++)
			{
			    if($fi == $CountField-1)
				{
					$sql .= "`" . $FieldArray[$fi] . "` = ";
					$sql .= "'" . $ValueArray[$fi] . "'";	
				}
				else
				{
					$sql .= "`" . $FieldArray[$fi] . "` = ";
					$sql .= "'" . $ValueArray[$fi] . "',";	
				}
			}
			
		     $sql .= " where `$Field` = '$Id'";			 
			$result = @mysql_query($sql);
			return $result;
		}
		else
		{
			return false;
		}
	}
	
	
	public function select_records($table,$fields,$where)
	{ 
	  $sql=@mysql_query("select ".$fields." from ".$table." where ".$where."");
	  
	  $num_rows=@mysql_num_rows($sql);
		  if($num_rows > 0)
		  {
			  while($row=@mysql_fetch_assoc($sql))
			  {
				 $data[]=$row;
			  }
			  return $data;
		  }
		  
	}
	
	public function select_record($table,$fields,$where)
	{ 
		$qsring = "select ".$fields." from ".$table." where ".$where."";
	  $sql=@mysql_query($qsring);
	  $num_rows=@mysql_num_rows($sql);
	  if($num_rows > 0)
	  {
		 $data = @mysql_fetch_assoc($sql);			 
		 return $data;
	  }
		  
	}
	
	public function get_records($table,$fields)
	{
		
	  $sql=@mysql_query("select ".$fields." from ".$table."");
	  $num_rows=@mysql_num_rows($sql);
		  if($num_rows > 0)
		  {
			  while($row=@mysql_fetch_assoc($sql))
			  {
				 $data[]=$row;
			  }
			  return $data;
		  }
		  
	}
	
	/*check if email exists*/
	public function check_email($table,$email)
	{
		
	  $sql	= @mysql_query("select * from ".$table." where email = '".$email."'");
	  $num_rows	= @mysql_num_rows($sql);
	  
	  if($num_rows == 0){ //email not exists.
		 return true;  
		 
	  }else{
		 return false;  
		 
	  }
		  
	}
	
	function checkpassword($table,$password,$id)
	{
	  $result = @mysql_query("SELECT id from ".$table." WHERE password = '".$password."' AND id='".$id."'");
      $no_rows = @mysql_num_rows($result);
        if ($no_rows > 0) { //exists.
            return true;
        
		}else{
		    return false;
		}
	}
	
	
	function get_query_records($sql){
	  	
		$sql=@mysql_query($sql);
	  	$num_rows=@mysql_num_rows($sql);
		
		if($num_rows > 0){
			  while($row=@mysql_fetch_assoc($sql))
			  {
				 $data[]=$row;
			  }
			  return $data;
		  }
	}
	
	###################### pagination ###########################
	function getPagingQuery($sql, $itemPerPage = 5)
	{
		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$page = (int)$_GET['page'];
		} else {
			$page = 1;
		}
		
		// start fetching from this row number
		$offset = ($page - 1) * $itemPerPage;
		
		return $sql . " LIMIT $offset, $itemPerPage";
	}
	
	function getPagingLink($sql, $itemPerPage = 5, $strGet = '',$self=FALSE)
	{
		$findme   = '?';
		$pos = strpos($strGet, $findme);
		
		if($pos === false)
		{
			$string_to_replace="?page";
		}
		else
		{
			$string_to_replace=$strGet."&page";
		}
		
		
		$result        = mysql_query($sql);
		$pagingLink    = '';
		$totalResults  = mysql_num_rows($result);
		$totalPages    = ceil($totalResults / $itemPerPage);
		
		// how many link pages to show
		$numLinks      =  10;
			
		// create the paging links only if we have more than one page of results
		if ($totalPages > 1) {
	
			if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
				$pageNumber = (int)$_GET['page'];
			} else {
				$pageNumber = 1;
			}
			
			// print 'previous' link only if we're not
			// on page one
			if ($pageNumber > 1) {
				$page = $pageNumber - 1;
				if ($page > 1) {
					$prev = "<li><a href=\"$self".$string_to_replace."=$page/\">&laquo;</a></li>";
				} else {
					$prev = "<li><a href=\"$self".$string_to_replace."=1\">&laquo;</a></li>";
				}	
				$first = "<li><a href=\"$self".$string_to_replace."=1\">&laquo;&laquo;</a></li> ";
			} else {
				$prev  = ''; // we're on page one, don't show 'previous' link
				$first = ''; // nor 'first page' link
			}
		
			// print 'next' link only if we're not
			// on the last page
			if ($pageNumber < $totalPages) {
				$page = $pageNumber + 1;
				$next = "<li><a href=\"$self".$string_to_replace."=$page\">&raquo;</a></li>";
				$last = "<li><a href=\"$self".$string_to_replace."=$totalPages\">&raquo;&raquo;</a></li>";
			} else {
				$next = ''; // we're on the last page, don't show 'next' link
				$last = ''; // nor 'last page' link
			}
	
			$start = $pageNumber - ($pageNumber % $numLinks) + 1;
			$end   = $start + $numLinks - 1;		
			
			$end   = min($totalPages, $end);
			$pagingLink = array();
			for($page = $start; $page <= $end; $page++)	{
				if ($page == $pageNumber) {
					$pagingLink[] = "<li class='active'><a>$page</a></li>";   // no need to create a link to current page
				} else {
					if ($page == 1) {
						$pagingLink[] = "<li><a href=\"$self".$string_to_replace."=1\">$page</a></li>";
					} else {	
						$pagingLink[] = "<li><a href=\"$self".$string_to_replace."=$page\">$page</a></li>";
					}	
				}
		
			}
			$pagingLink = implode('', $pagingLink);
			
		  // return the page navigation link
		  
		  $pagingLink = '<ul class="pagination">'.$first . $prev . $pagingLink . $next . $last.'</ul>';
		  
		}
		return $pagingLink;
	}
	
	function getRows($sql){
		
		$sql=@mysql_query($sql);
	  	$num_rows=@mysql_num_rows($sql);
		if($num_rows > 0)
		{
			  while($row=@mysql_fetch_assoc($sql))
			  {
				 $data[]=$row;
			  }
			  return $data;
		 }
	}
	
	public function get_count_of_records($table)
	{
		
	  $sql = @mysql_query("select * from ".$table."");
	  echo $num_rows = @mysql_num_rows($sql);
	}

	function getDates($sql){
		
		$sql=@mysql_query($sql);
	  	$num_rows=@mysql_num_rows($sql);
		if($num_rows > 0)
		{
			return $sql;
		}
	}
}
?>