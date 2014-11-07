			</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Welcome <?php echo $username;?></h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">

					<h1> Choose Your Destiny!</h1>
				
					<table> 
					<tbody> 
					<tr> 
					
					<th></th> 
					<th>Tools</th> 
					<th>Cost</th> 
					<th>Buy</th> 
					</tr> 
					<tr> 
					<td><img src="<?php echo $html->includeImage('/account/sex.png'); ?>" alt="" /></td> 
					<td>Change your Sex</td> 
					<td><?php echo $toolscost['sex']; ?></td> 
					<td><?php echo $html->link('Go', 'users/tools/1/'); ?></td> 
					</tr> 
					<tr class="even"> 
					<td><img src="<?php echo $html->includeImage('/account/race.png'); ?>" alt="" /></td> 
					<td>Change Your Race</td> 
					<td><?php echo $toolscost['race']; ?></td> 
					<td>Go</td> 
					</tr> 
					
					<tr> 
					<td><img src="<?php echo $html->includeImage('/account/char.png'); ?>" alt="" /></td> 
					<td>Change your Faction</td> 
					<td><?php echo $toolscost['faction']; ?></td> 
					<td>Go</td> 
					</tr> 
					<tr class="even"> 
					<td><img src="<?php echo $html->includeImage('/account/name.png'); ?>" alt="" /></td> 
					<td>Change Name</td> 
					<td><?php echo $toolscost['name']; ?></td> 
					<td>Go</td> 
					</tr> 
					<tr> 
					<td><img src="<?php echo $html->includeImage('/account/faction.png'); ?>" alt="" /></td> 
					<td>Change Account</td> 
					<td><?php echo $toolscost['faction']; ?></td> 
					<td>Go</td> 
					</tr> 
					</tbody> 
					</table> 
	
	<hr />
					</div><!-- end .col-left -->
					         <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebarchar.php'); ?>

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

