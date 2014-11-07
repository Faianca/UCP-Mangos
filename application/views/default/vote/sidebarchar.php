
								<div style="">
								<div style="float:left;">
								<h2 >Choose Your Character</h2>
<?php
									global $chars, $char,$session;
									if($session->is_set('realmid'))
									$chars->get_chares(); 
									?><br>
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
	<input type="submit" class="button" value="Go!"/></select>
	</form>		
									</div>
								<div style="float:right;">
								<h2>Statistics</h2>
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
								</div>	</div>