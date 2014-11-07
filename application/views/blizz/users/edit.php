<?php global $session, $pager; ?>
<script type="text/javascript">
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
</script>

<div class="landingcontents"> 
				<div class="holder"> 
		<div class="pagetitle"> 
			<div class="title"> 
					<h1>Donate System</h1>
 
			</div> 
		</div> 
		<div class="company-landing">		
			<div class="links"> 
				<div class="standardbox"> 
					<div class="topbar"> 
						<div class="leftcorner"></div> 
						<div class="rightcorner"></div>									
						<div class="middle"> 
							<div class="rightfade"></div>					
							<div class="title"> 
							<h2>Edit Your Account!</h2>
							
							</div> 
						</div>					
					</div> 
					<div class="middlebar"> 
					<?php display_msg();?>
					<form action="" method="post">
					<table border="0" cellspacing="1" cellpadding="3">
					<input type='hidden' value="1" name="edit_user" />
					<tr> <td ><font face='verdana, arial, helvetica' size='2' align='center'>  &nbsp;New Email 
					</font></td> <td  class='medium' align='center'><font face='verdana, arial, helvetica' size='2' >
					<input type ='text' class='bginput' name='email' ></font></td></tr>
					<tr> <td ><font face='verdana, arial, helvetica' size='2' align='center'>  &nbsp;New Password
					</font></td> <td  class='medium' align='center'><font face='verdana, arial, helvetica' size='2' >
					<input type ='password' class='bginput' name='password' ></font></td></tr>
	        <tr>
		<td>
			<button type="submit" class="button" name="submit"><span><?php echo $lang['submit'] ?></span></button>
		</td>
	</tr>	
	</table>
	</form>
	
			
			
	
			</div> 
					<div class="bottombar"> 
						<div class="middle"> 
							<div class="leftcorner"></div> 
							<div class="rightcorner"></div> 
							<div class="backgroundfour"></div>										
						</div>				
					</div> 
					<div class="shadowbar"> 
						<div class="line"></div>				
						<div class="shadow"></div> 
					</div>				
				</div> 
			</div>					
			<div style="height: 5px; width: 100%; clear: both; font-size: 0px;"></div>			
 
		</div>		
 
					

				

