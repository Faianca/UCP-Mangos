<?php global $serverinfo;?>
			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Arena Ladder</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-center">
					
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
	echo "<option>There is no realms</option>";
	endif;
	?>
	<input type="submit" class="button" value="Go!"/></select>
	</form>		<br>
			<?php if($session->is_set('realmid')):	
					echo "<center><h2>Realmname: ".$realmname[0]['name']."</center>"; endif;?>
					<br>
		<a href="<?php echo BASE_PATH;?>/page/arena/2"><img src="<?php echo $html->includeImage('arenas/2v2.png');?>" /></a>				
		<a href="<?php echo BASE_PATH;?>/page/arena/3"><img src="<?php echo $html->includeImage('arenas/3v3.png');?>" /></a>				
		<a href="<?php echo BASE_PATH;?>/page/arena/5"><img src="<?php echo $html->includeImage('arenas/5v5.png');?>" /></a>	</center>			
		<hr />
					</div><!-- end .col-left -->

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

