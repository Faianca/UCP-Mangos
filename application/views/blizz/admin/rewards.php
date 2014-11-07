<div id="main_panel_container" class="left">
			<div id="dashboard">
				<h2 class="ico_mug">Manage rewards</h2>
				<div class="clearfix">
				<div class="left quickview">

<form action="" method="post">
	Delete reward:
	<select name="deletereward">';
	<?php foreach($row1 as $rewards):
	echo '<option value="'.$rewards['id'].'">Headline: '.$rewards['name'].' @ Realm: '.$rewards['realm'].'</option>';
	endforeach;?>
	</select> <input type="submit" value="Delete!"/></form>
	
	<br /><form action="<?php echo BASE_PATH."/admin/rewards/"; ?>" method="post">
    Add reward:<br /><br />
	<input type="text" name="additemid" value="Item id"/><br /><br />
	<input type="text" name="additemname" value="Item name"/><br /><br />
	<input type="text" name="additemcost" value="Item cost points"/><br /><br />
	<select name="additemstack">
	<option value="0">-- Stacks--</option>
	<option value="0">0 Stacks</option>
	<option value="5">5 Stacks</option>
	<option value="10">10 Stacks</option>
	<option value="15">15 Stacks</option>
	<option value="20">20 Stacks</option>
	</select><br /><br />
	<select name="additemcolor">
	<option value="0">-- Item color --</option>
	<option value="0">Poor (gray)</option>
	<option value="1">Common (white)</option>
	<option value="2">Uncommon (green)</option>
	<option value="3">Rare (blue)</option>
	<option value="4">Epic (purple)</option>
	<option value="5">Legendary (orange)</option>
	<option value="6">Artifact (beige)</option>
	<option value="7">Heirloom (beige)</option>
	</select><br /><br />
	<select name="additemrealm">
	<option>-- Realm --</option>
	<?php foreach($row2 as $rewards_r):
	echo '<option value="'.$rewards_r['id'].'">'.$rewards_r['name'].'</option>';
	endforeach;?>
	</select><br /><br />
	<input type="submit" value="Add item!"/>
	
	</form><br /><hr /><br /><br />
		</div>
				
				</div>
			</div><!-- end #dashboard -->
			
			
			
			
			</div>
			
				<?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebar.php'); ?>

			
		</div><!-- end #content_main -->
		
		
		
		
	
	
	
		
	    </div><!-- end #content -->
