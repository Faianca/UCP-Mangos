<?php global $session;
  $session->unlink_pin();
  $session->set('pin_value', md5(rand(2, 99999999)));
  $generated_pin = $session->generate_pin($session->value('pin_value'));
  $pin_image_output = $session->show_pin($session->value('pin_value'), $generated_pin);

?>
		<div class="landingcontents"> 
		<div class="games-landing">		

	<div class="allgames"> 
			<div class="standardbox"> 
				<div class="topbar"> 
					<div class="leftcorner"></div> 
					<div class="rightcorner"></div>									
					<div class="middle"> 
						<div class="rightfade"></div>					
						<div class="title"> 
						<h4>Create Account</h4>
							
						</div> 
					</div>					
				</div> 
									

				<div class="middlebar"> 
							<div class="loginblizz"> 
							
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

		</div>			
				</div> 
				<div class="bottombar"> 
					<div class="middle"> 
						<div class="leftcorner"></div> 
						<div class="rightcorner"></div> 
						<div class="backgroundthree"></div>										
					</div>				
				</div> 
				<div class="shadowbar"> 
					<div class="line"></div>				
					<div class="shadow"></div> 
				</div>				
			</div> 
		</div> 
 
		<div style="height: 1px; width: 100%; clear: both; font-size: 0px;"></div> 

