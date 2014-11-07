<?php global $serverinfo, $session; ?>
			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
		
				<div id="page-title"><h1>Statistics!</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">
						<?php if($session->is_set('realmid')): ?>
				<?php echo "<UL id=\"quick-info\">";
					echo "<li><h2>Realmname: ".$realmname[0]['name']."</h2></li>";
					echo "<li>Online: ".$serverinfo->get_online()."</li>";
					echo "<li>Uptime: ".$serverinfo->get_uptime()."</li>";
					echo "<li>Players Online: ".$serverinfo->get_playersonline()."</li>";
					echo "<li>Max Online: ".$serverinfo->get_maxonline()."</li>";
					echo "<li>Server Version: ".VERSION."</li>";
					echo "<li>Realmlist: ".REALMLIST."</li></UL><div class=\"clear\"></div>";
				endif;	?>
			<br>
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
					<hr />
					</div><!-- end .col-left -->
					           <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidepage.php'); ?>


					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

