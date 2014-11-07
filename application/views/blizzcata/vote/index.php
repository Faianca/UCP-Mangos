<?php 
	global $char, $chars, $session;
?>

	<div class="landingcontents"> 
			<div class="holder"> 
	<div class="pagetitle"> 
		<div class="title"> 
				<h1>Vote System</h1>

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
						<h2>Top Sites!</h2>
						
						</div> 
					</div>					
				</div> 
				<div class="middlebar"> 
				<?php echo $msgOK; ?>
			Your currently Have: <?php echo $points; ?><img src="<?php echo $html->includeImage('vote/coins.png'); ?>" /> Vote points
								<br /><br />

<div id="tabledata" class="section"> 
		 
		<table id="table"> 
		<thead> 
		<tr> 
			<th>Rewards Name</th> 
			<th>Cost</th>
			<th>Buy</th> 
		</tr> 
		</thead> 
		<tbody>  
								<?php 

								foreach($topsite as $top):
								echo "<tr>".$top."</tr>";
								endforeach;

								?>
				<tbody>  </table>
								<br /><center><a href=" ">Refresh</a></center>
				</div> </div> 
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

		<div class="links"> 
			<div class="standardbox"> 
				<div class="topbar"> 
					<div class="leftcorner"></div> 
					<div class="rightcorner"></div>									
					<div class="middle"> 
						<div class="rightfade"></div>					
						<div class="title"> 
						<h2>Buy Rewards!</h2>
						
						</div> 
					</div>					
				</div> 
				<div class="middlebar"> 
				<div class="line">
	 <?php
	if($session->is_set('realmid') && $session->is_set('guid')):
	if(!empty($shop)):
	?>
	   <div id="tabledata" class="section"> 
		 
		<table id="table"> 
		<thead> 
		<tr> 
			<th>Rewards Name</th> 
			<th>Cost</th>
			<th>Buy</th> 
		</tr> 
		</thead> 
		<tbody>  
	<?php
	foreach($shop as $shop):
	
	 echo '<tr><td><a class="q'.$shop['color'].'" href="http://www.wowhead.com/?item='.$shop['itemid'].'" target="_blank">'.$shop['name'].'</a></td> ';
	 echo '<td>'.$shop['cost'].' <img src="'.$html->includeImage('vote/coins.png').'" /></td><td>'.$html->link('Buy', 'vote/buy/'.$shop['itemid']).'</td></tr>';
	 endforeach;
	 ?></tbody> 
	</table> <?php
	 else: 
	 echo '<span style="color:red">No rewards in database</span>';
	endif;//shop
	else:
	echo "<span class=\"notice\">Please choose your character and your realm below</span>";
	endif;
	?>
	
			
				</div> </div> </div>
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


	<div class="didyouknow"> 
		<div class="standardbox"> 
			<div class="topbar"> 
				<div class="leftcorner"></div> 
				<div class="rightcorner"></div>									
				<div class="middle"> 
					<div class="rightfade"></div>					
					<div class="title"> 
					<h2>Choose one Realm!</h2>
					</div> 
				</div>					
			</div> 
			<div class="middlebar"> 
				<div class="line">					
					<table class="quotetable"> 
						<tr> 
						<td style="padding:20px;"> 
						
	<?php 
if($session->is_set('realmid'))
									$chars->get_chares(); 
	
	?> 
	<br>
	<form action="" method="post"> 
	Select realm: 
	<select name="realm">
	<?php
	$i= 1;
	if(!empty($realms)):
	foreach($realms as $realms):
	echo '<option value="'.$realms['id'].'">'.$realms['name'].'</option>';
	$i++;
	endforeach;
	else : 
	echo "<option>No realms in database</option>";
	endif;
	?>
	<input type="submit" class="button" value="Go!"/></select>
	</form>					
							</td> 
						</tr> 
					</table> 
				</div> 
			</div>	
			<div class="bottombar"> 
				<div class="middle"> 
					<div class="leftcorner"></div> 
					<div class="rightcorner"></div> 
				</div>				
			</div> 
			<div class="shadowbar"> 
				<div class="line"></div>				
				<div class="shadow"></div> 
			</div>				
		</div> 
	</div>		


	
	<div class="contact"> 
		<div class="standardbox"> 
			<div class="topbar"> 
				<div class="leftcorner"></div> 
				<div class="rightcorner"></div>									
				<div class="middle"> 
					<div class="rightfade"></div>					
					<div class="title">                        	
						<h2>Statistics</h2></div> 
							
				</div>					
			</div> 
			<div class="middlebar"> 
				<div class="line"> 
					<div class="description"> 
					<?php 
						
				if($session->is_set('realmid')):
							    echo "<h2>Realm:</h2>";
							echo $realmname[0]['name'];
						 endif;
							if($session->is_set('guid')):
							echo "<h2>Character Name:</h2>";
							echo $chars->get_charname($session->value('guid'));
							echo "<h2>Points:</h2>";
							echo $points; 								
							endif;
						
						?> 
					</div>				
											
				</div> 
			</div>	
			<div class="bottombar"> 
				<div class="middle"> 
					<div class="leftcorner"></div> 
					<div class="rightcorner"></div> 
				</div>				
			</div> 
			<div class="shadowbar"> 
				<div class="line"></div>				
				<div class="shadow"></div> 
			</div>				
		</div> 
	</div>


	</div>		
			</div> 


