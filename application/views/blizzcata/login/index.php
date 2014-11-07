</div>
<!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>How to connect to our server?</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">

<?php 
//echo $lol;
//display_msg(); 
?>
   

  <form action="" method="post" id="user_form" name="user_form">
    <table cellspacing="0" cellpadding="0" class="box">
      <thead>
        <tr>
          <td colspan="2"><?php echo $lang['userlogin']; ?></td>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan="2"><input name="submit" type="submit" value="<?php echo $lang['loginnow']; ?>"  class="button"/></td>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td width="150"><strong><?php echo $lang['accountusername']; ?></strong></td>
          <td><input name="username" type="text"  class="inputbox" size="45" />
         </td>
        </tr>
        <tr>
          <td><strong><?php echo $lang['accountpassword']; ?></strong></td>
          <td><input name="password" type="password"  class="inputbox" size="45" />
            </td>
        </tr>
        <!-- Coming Soon 
		<tr>
          <td><strong><?php //echo $lang['rememberme']; ?></strong></td>
          <td><input name="remember" type="checkbox" class="checkbox" value="1" /></td>
        </tr> -->
        <tr>
          <td colspan="2"><strong><?php echo $lang['notyetregistered']; ?> <a href="register.php"><?php echo $lang['signup']; ?>!</a><br />
           <!-- Coming Soon  <?php// echo $lang['forgotyourpassword']; ?> <a href="register.php?do=recover"><?php //echo $lang['recoverhere']; ?></a></strong>-->
		   </td>
        </tr>
      </tbody>
    </table>
  </form>
	<hr />
					
					</div><!-- end .col-left -->
					
					         <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebar.php'); ?>


					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->
