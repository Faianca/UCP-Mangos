			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Edit Account</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">
					<?php display_msg();?>
					<form action="" method="post">
					<table border="1" cellspacing="1" cellpadding="3">
					<input type='hidden' value="1" name="edit_user" />
					<tr> <td ><font face='verdana, arial, helvetica' size='2' align='center'>  &nbsp;New Email 
					</font></td> <td  class='medium' align='center'><font face='verdana, arial, helvetica' size='2' >
					<input type ='text' class='bginput' name='email' ></font></td></tr>
					<tr> <td ><font face='verdana, arial, helvetica' size='2' align='center'>  &nbsp;New Password
					</font></td> <td  class='medium' align='center'><font face='verdana, arial, helvetica' size='2' >
					<input type ='password' class='bginput' name='password' ></font></td></tr>
	        <tr>
		<td>
			<button type="submit" name="submit"><span><?php echo $lang['submit'] ?></span></button>
		</td>
	</tr>	
	</table>
	</form>

				
	
	<hr />
					</div><!-- end .col-left -->
					       
					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->
