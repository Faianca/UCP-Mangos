<?php
   /**
   * Transfers / Character Tools Class!
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: class.trans.php,v 3.0 
   */
class trans {
   
     private $name;
     private $guid;
     private $points;
     private $id;
	 
   public function __construct($name,$guid,$points,$id,$realmdb)
    {
        $this->name = $name;
        $this->guid = $guid;
	$this->points = $points;
	$this->id = $id;
	$this->realmdb = $realmdb;
    }
 
   function get_form($name){
   ?>
   	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> 
   	<table width="500" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#ffffff"> 
   	<tr align="center" bgcolor="#FFFFFF"> 
   	</tr> 
   	<tr> 
   	<td align="right">New <?php echo $name;?>: </td> 
   	<td><input type="textfield" name="<?php echo $name;?>" ></td> 
   	<td><input type="submit" name="Submit" class="button" value="Submit"></td> 
   	</tr> 
   	</table> 
   	</form> 
	<?php
   
   
   } // Get_form Method Ends
    
   function get_form1($name){
   ?>
   	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> 
   	
   	<input type="textfield" name="<?php echo $name;?>" >
   	<input type="submit" name="Submit" class="button" value="Submit">
   	</form> 
	<?php
   
   
   } // Get_form Method Ends
 
   function changename($name1) {
   	   
   	   global $db, $msgAlert, $showMsg;
    
   	   $this->name1 = $name1;
   	   $leghth_limit="12"; 
   	   if (strlen($this->name1) <= $leghth_limit AND ctype_alpha($this->name1)):
   	 	$this->name1 = ucfirst(strtolower($this->name1));
   	 	$result = $db->query("SELECT name FROM ".$this->realmdb.".".DB_CHARS." WHERE name = '{$this->name1}' ");

   	 	if(mysql_num_rows($result) !== 0):
           		$showMsg = '<span class="alert"><strong>User already exist</strong></span>';
           		else:  
				if($this->points >= 50):
                               	  $pointsfim = $this->points - 50;
                               	  $pointscusta = 50;
                               	  $db->query("UPDATE ".$this->realmdb.".".DB_CHARS." SET name = '{$this->name1}' WHERE guid = '{$this->guid}'");
                               	  $db->query("UPDATE ".DB_UCP.".vote_points SET points = {$pointsfim} WHERE username = '{$_SESSION['username']}'");
                               	  $showMsg = '<span class="notice"><strong>Congratulations! You changed your Character name. </strong></span><a href="">Refresh</a>';
                               $logMsg = "[CHARACTER TOOLS][NAME] [CHAR_ID]:{$this->guid} [ACCOUNT]: {$_SESSION['username']} [DATE]: ".date("F j, Y, g:i a")."\r\n";
				 errorwrite($logMsg, 'charactertools.log');
                               	else:
                               	  $showMsg = "<span class='alert'><strong>ERROR: You dont Have Enough Points. </strong></span>";
			endif;
		endif; 
	else:  
        	$showMsg  = '<span class="alert"><strong>ERROR: Your name can only have '.$leghth_limit.' characters</strong></span>'; 
	endif; 

  	} // Changename method Ends
 
		
	function changegender($gender) 
	{
		global $db, $msgAlert, $showMsg;
                    $this->gender = $gender; 
                    if($this->points >= 100):
                              $pointsfim = $this->points - 100;
                              $pointscusta = 100;
                              $db->query("UPDATE ".$this->realmdb.".".DB_CHARS." SET  gender = {$this->gender} WHERE guid = '{$this->guid}'");
                              $db->query("UPDATE ".DB_UCP.".vote_points SET points = {$pointsfim} WHERE username = '{$_SESSION['username']}'");
                              
                              $showMsg = "<span class='notice'>You changed your gender and you have {$pointsfim} Points  </span><a href=''>Refresh</a>";			
                              $logMsg = "[CHARACTER TOOLS][GENDER [CHAR_ID]:{$this->guid} [ACCOUNT]: {$_SESSION['username']} [DATE]: ".date("F j, Y, g:i a")."\r\n";
				 errorwrite($logMsg, 'charactertools.log');
                              else: 
			$showMsg = "<span class='alert'><strong>ERROR: You dont Have Enough Points. </strong></span>";
		    endif;
		    
	} // Changegender method Ends
 
 
	function changeAccount($conta) 
	{
		global $db, $msgAlert, $showMsg;
                          $this->conta = $conta;
	                  $result2 = $db->query("SELECT id FROM ".DB_NAME.".account WHERE username = '{$this->conta}'");
                                if(mysql_num_rows($result2) !== 0):
                                	if($this->points >= 150):
						$pointsfim = $this->points - 150;
						$pointscusta = 150;
						
						while($contaid = mysql_fetch_array($result2, MYSQL_ASSOC)):
						$db->query("UPDATE ".$this->realmdb.".".DB_CHARS." SET account = {$contaid['id']} WHERE guid = '{$this->guid}'");
						$db->query("UPDATE ".DB_UCP.".vote_points SET points = {$pointsfim} WHERE username = '{$_SESSION['username']}'");
						$showMsg = "<span class='notice'><strong>Congratulations! Your characters has been transfered.</strong></span><a href=''>Refresh</a>";
						 $logMsg = "[CHARACTER TOOLS][ACCOUNT] [CHAR_ID]:{$this->guid} [ACCOUNT]: {$_SESSION['username']} [DATE]: ".date("F j, Y, g:i a")."\r\n";
						 errorwrite($logMsg, 'charactertools.log');
						unset($_SESSION['guid']);
						endwhile;	
								  							  
					else:
					$showMsg = "<span class='alert'><strong>ERROR: You dont Have Enough Points. </strong></span>";
			      endif;
			                			
			      else: 
			      		$showMsg = "<span class='alert'><strong>ERROR: Account doesnt exist. </strong></span>";
			      endif; 
				
	} // ChangeAccount method Ends
				
	function changefaction($class) 
	{
		 global $db, $msgAlert, $showMsg;
	        
	        $this->classf = $class;
			 if($this->points >= 500):
                                 $pointsfim = $this->points - 500;
                                 $pointscusta = 500;
                                 $db->query("UPDATE ".$this->realmdb.".".DB_CHARS." SET  race = {$this->classf} WHERE guid = '{$this->guid}'");
                                 $db->query("UPDATE ".DB_UCP.".vote_points SET points = {$pointsfim} WHERE username = '{$_SESSION['username']}'");
                                 $showMsg = "<span class='notice'><strong>Congratulations! Your characters has been transfered.</strong></span><a href=''>Refresh</a>";		
                                 $logMsg = "[CHARACTER TOOLS][FACTION] [CHAR_ID]:{$this->guid} [ACCOUNT]: {$_SESSION['username']} [DATE]: ".date("F j, Y, g:i a")."\r\n";
				 errorwrite($logMsg, 'charactertools.log');
                          else:
			 	 $showMsg = "<span class='alert'><strong>ERROR: You dont Have Enough Points. </strong></span>";
			  endif;
			  
	} // End method changefaction
 
	function changerace($class) 
	{
		global $db, $msgAlert, $showMsg;
	        $this->classf = $class;
			 if($this->points >= 150):
                                 $pointsfim = $this->points - 150;
				 $pointscusta = 150;
				 $db->query ("UPDATE ".$this->realmdb.".".DB_CHARS." SET  race = {$this->classf} WHERE guid = '{$this->guid}'");
				 $db->query ("UPDATE ".DB_UCP.".vote_points SET points = {$pointsfim} WHERE username = '{$_SESSION['username']}'");
				 $showMsg = "<span class='notice'>You changed your Race and you have {$pointsfim} Points  </span><a href=''>Refresh</a>";		 
				 $logMsg = "[CHARACTER TOOLS][RACE] [CHAR_ID]:{$this->guid} [ACCOUNT]: {$_SESSION['username']} [DATE]: ".date("F j, Y, g:i a")."\r\n";
				 errorwrite($logMsg, 'charactertools.log');
			else: 
			 	$showMsg = "<span class='alert'><strong>ERROR: You dont Have Enough Points. </strong></span>";
			 endif;
	} // End method changefaction
 
 } // End
