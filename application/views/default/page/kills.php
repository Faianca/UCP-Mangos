<?php global $session; ?>
			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
	<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Hall of Fame</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">
					<h1>Top 20 Killers!</h1><center>
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
	echo "<option>There is no realms realms</option>";
	endif;
	?>
	<input type="submit" class="button" value="Go!"/></select>
	</form>		</center><br>
			<?php if($session->is_set('realmid')):	
					echo "<center><h2>Realmname: ".$realmname[0]['name']."</center>";
	echo "<div style=\"margin-left:40px;\"><center><table id=\"dataTable\"><THEAD>
	<tr><th>Rank:</th><th>Username:</th><th>Top Kills:</th></tr></THEAD><TBODY>"; 
	$i = 1;
		foreach($row as $result_data):
			echo "<td>".$i."</td>";
			echo "<td>".$result_data["name"]."</td>";  
			echo "<td>".$result_data["totalKills"]."</td>";   
			echo "</tr>";
			$i++;
		endforeach; 
	echo "</TBODY></table></center></div>";   
	endif; ?>
	
					<hr />
					</div><!-- end .col-left -->
					           <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidepage.php'); ?>

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

