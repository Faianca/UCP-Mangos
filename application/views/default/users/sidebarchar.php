 <div class="side-right">
					<div class="widget-area">
<?php global $chars, $char; ?>
					<div class="widget-box">
							<ul>
								<li class="widget-container">
								<h2 class="widget-title">Choose Your Character</h2>
								<div class="lineleft">
								<div class="lineleft-b">
								<ul>
						
								<li>
								
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
						
									$chars->get_chares(); 
									endif;
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
	<input type="submit" class="button" value="submit!"/></select>
	</form>		
								
											<b>
	</li>
								</ul>
								</div>
								</div>
								</li>
							</ul>
						</div><!-- end widget-box -->
					</div><!-- end widget-area -->
	
		
					
				
					</div><!-- end .side-right -->