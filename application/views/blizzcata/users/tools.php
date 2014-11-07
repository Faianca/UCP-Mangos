<?php global $trans, $verify, $chars, $char, $session, $toolscost; ?>

<div class="landingcontents"> 
				<div class="holder"> 
		<div class="pagetitle"> 
			<div class="title"> 
					<h1>Character Tools</h1>
 
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
							<h2>Choose your Destiny!</h2>
							
							</div> 
						</div>					
					</div> 
					<div class="middlebar"> 
			<?php if($session->is_set('guid')):
			if($chars->online($session->value('guid')) == '0'):  ?>
			<?php display_msg();?>
	<table border="0" cellpadding="3" cellspacing="3">
		<tr>
		<td ><img src="<?php echo $html->includeImage('icons/factions_horde.png');?>" /></td>
		<td ><h2>New Faction:</h2></td>
		<td><h2><?php echo $toolscost['faction'];?> Points</h2></td>
		<td> 
			<form action="" method="post">
			<select name="class">
	               <?php echo $verify->get_races(!$verify->get_faction($chars->get_race($session->value('guid'))),$chars->get_class($session->value('guid'))); ?>
			</select>
			<button type="submit" class="button" name="Mudar"><span><?php echo $lang['submit'] ?></span></button>
			</form>
		</td>
		</tr>
		<tr>
		<td><img src="<?php echo $html->includeImage('icons/newrace.png');?>" /></td>
		<td>
		<h2>New Race:</h2></td>
		<td><h2><?php echo $toolscost['race'];?> Points</h2></td>
		<td>
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
				 <select name="race">
				 <?php 
				 $verify->get_races($verify->get_faction($chars->get_race($_SESSION['guid'])),$chars->get_class($_SESSION['guid']));
				 ?>
				</select>
				<button type="submit" class="button" name="submit"><span><?php echo $lang['submit']?></span>
			</form>
		</td>
		</tr>
		<tr>
		<td><img src="<?php echo $html->includeImage('icons/gender_female.png');?>" /></td>
		<td><h2>New Sex:</h2></td>
		<td><h2><?php echo $toolscost['sex'];?> Points</h2></td>
		<td> <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<select name="gender">
			<option value="0">Male</option>
			<option value="1">Female</option>	
			</select>
			<button type="submit" class="button" name="Sexo"><span><?php echo $lang['submit']?></span>
			</form>	
		</td>
		</tr>
		<tr>
		<td><img src="<?php echo $html->includeImage('icons/changename.png');?>" /></td>
		<td>
		<h2>New Name:</h2></td>
		<td><h2><?php echo $toolscost['name'];?> Points</h2></td>
		<td>	
		<?php $trans->get_form1('name'); ?> 
		</td>
		</tr>
		<tr>
		<td><img src="<?php echo $html->includeImage('icons/newaccount.png');?>" /></td>
		<td>
		<h2>New Account:</h2></td>
		<td><h2><?php echo $toolscost['account'];?> Points</h2></td>		<td>			
			<?php $trans->get_form1('account'); ?>
		</td>
		</tr>
		</table>
	


			<?php else: ?>
			<span class='notice'>Your characters needs to be offline! </span>
<?php endif; ?>				
<?php else: ?>
	<span class='notice'>You need to choose one character first! </span>
<?php endif; ?>				</div> 
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
						<h2>Choose one Character!</h2>
						</div> 
					</div>					
				</div> 
				<div class="middlebar"> 
					<div class="line">					
						<table class="quotetable"> 
							<tr> 
								<td style="padding:20px;"> 

		<form action="" method="post"> 
		Choose Realm: 
		<select name="realm">
		<?php
		$i= 1;
		if(!empty($realms)):
		foreach($realms as $realms):
		echo '<option value="'.$realms['id'].'">'.$realms['name'].'</option>';
		$i++;
		endforeach;
		else : 
	echo "<option>There is no realms</option>";
	endif;
	?>
	<input type="submit" class="button" value="submit!"/></select>
	</form>			<br>
							<?php
							if($session->is_set('realmid'))
							$chars->get_chares(); 
								
								
								?>
						
									
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
							
							if($session->is_set('guid')):
								echo "<br>Personagem: ".$chars->get_charname($session->value('guid'))."<br>";
								echo "Raca: ".$char->get_race()."<br>"; 
								echo "Classe: ".$char->get_class()."<br>";
								echo "Sexo: ".$char->get_gender()."<br>";
								echo "Pontos: ".$points."<br>";								
							endif;
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
		
	
	
				
