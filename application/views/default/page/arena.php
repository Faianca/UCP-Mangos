<?php global $serverinfo;?>
			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Arena Ladder</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">
						<center>
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
	echo "<option>There is no realms.</option>";
	endif;
	?>
	<input type="submit" class="button" value="Go!"/></select>
	</form>		<br>
			<?php if($session->is_set('realmid')):	
					echo "<center><h2>Realmname: ".$realmname[0]['name']."</center>"; endif;?>
					<h1>Top 20 <?php echo $team."x".$team; ?></h1>
					<?php $serverinfo->get_toparena($team); ?>
		
		<hr />
					</div><!-- end .col-left -->
					           <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidepage.php'); ?>

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

