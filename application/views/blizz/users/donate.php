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
							<h2>Donation Items!</h2>
							
							</div> 
						</div>					
					</div> 
					<div class="middlebar"> 
	     <div id="tabledata" class="section"> 
			 
                      	<table id="table"> 
			<thead> 
			<tr> 
				<th>Title </th> 
				<th>Status</th> 
				
				<th>Amount</th>
				<th>Buy</th>
			</tr> 
			</thead> 
			<tbody> 
					
			<?php
			//$total_amount = '';
			foreach ($usrow as $row):
			?>
			<tr>
			<td class="table_date"><?php echo $row['title'];?></td>
         	        <td class="table_title"><img src="<?php echo $html->includeImage(strtolower($row['status']).".gif");?>"/></td>
         	        <td class="table_title"><?php echo $row['amount'];?>$ Dollares</td>
         	        <td class="table_title"><a href="<?php echo BASE_PATH."/users/checkout/".$row['id'].""?>"><img src="<?php echo $html->includeImage('buy_now.gif');?>"/></a></td>
         	        </td>	
         	        </tr> 
         <?php 
         endforeach;
         unset($row);
          ?>
        

			</tbody> 
		</table> 
	
			
			<div class="pagination"> 
				<?php echo $pager->display_pages(); ?>
			</div> 
		</div> <!-- end #tabledata --> 	
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
 
