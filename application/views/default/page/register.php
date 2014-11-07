<?php global $session;
  $session->unlink_pin();
  $session->set('pin_value', md5(rand(2, 99999999)));
  $generated_pin = $session->generate_pin($session->value('pin_value'));
  $pin_image_output = $session->show_pin($session->value('pin_value'), $generated_pin);

?>
</div>
<!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Create An Account?!</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-center">
   

 <p class="info"><?php echo $lang['pleasefill'];?></p>
<?php display_msg();?>
<span id="status"></span>
  <form action="" method="post" id="user_form" name="user_form">
  <input type="hidden" name="register" value="1" />
    <table cellspacing="0" cellpadding="0" class="box">
      <thead>
        <tr>
          <td colspan="2"><?php echo $lang['userregistration'];?></td>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan="2"><input name="submit" type="submit" value="Submit"  class="button"/></td>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          <td width="150"><strong><?php echo $lang['accountusername'];?></strong></td>
          <td><input name="username" type="text"  id="user_name" class="inputbox" size="45" maxlength="20" />
        </tr>
        <tr>
          <td><strong><?php echo $lang['accountpassword'];?></strong></td>
          <td><input name="password" type="password"  class="inputbox" size="45" maxlength="20" />
        </tr>
        <tr>
          <td><strong><?php echo $lang['passwordrepeat'];?></strong></td>
          <td><input name="password2" type="password" class="inputbox" size="45" maxlength="20" />
        </tr>
        <tr>
          <td><strong><?php echo $lang['yourmail'];?></strong></td>
          <td><input name="email" type="text" class="inputbox" size="45" maxlength="40" />
        </tr>
       	<tr>
          <td><strong><?php echo $lang['entercaptcha'];?></strong></td>
          <td><input name="pin_submitted" type="text" id="pin_submitted" class="inputbox" size="15"  />
            <?php echo $pin_image_output;?>
            <input type="hidden" name="pin_generated" value="<?php echo $session->value('pin_value');?>" /></td>
        </tr>
	   <tr>
        <td colspan="2"><a href="<?php echo BASE_PATH."/page/login/";?>"><strong><?php echo $lang['backtologin'];?></strong></a></td>
        </tr>
      </tbody>
    </table>
  </form>

	<hr />
					
					</div><!-- end .col-left -->
					


					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

