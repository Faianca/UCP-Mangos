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
						<h4>User Login</h4>
							
						</div> 
					</div>					
				</div> 
									

				<div class="middlebar"> 
							<div class="loginblizz"> 
							<?php 
							//echo $lol;
							echo display_msg(); 
							?>	
<center>
  <form action="" method="post" id="user_form" name="user_form">
    <table cellspacing="0" cellpadding="0" class="box">
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
          <td><strong>
          <td><input name="remember" type="checkbox" class="checkbox" value="1" /></td>
        </tr> -->
        <tr>
          <td colspan="2"><strong><?php echo $lang['notyetregistered']; ?> <a href="<?php echo BASE_PATH;?>/page/register/"><?php echo $lang['signup']; ?>!</a><br />
           <!-- Coming Soon  // echo $lang['forgotyourpassword']; ?> <a href="register.php?do=recover">//echo $lang['recoverhere']; ?></a></strong>-->
		   </td>
        </tr>
      </tbody>
    </table>
  </form></center>
 
						
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

