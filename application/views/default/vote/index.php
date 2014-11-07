<?php 
	global $char, $chars, $session;
?>
</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Checkout</h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-center">	       
					<div id="tabledata" class="section"> 
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
				</div> </div> </div>
									<div class="col-center">	       

			
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
	
			</tbody></table></div>


<hr />
					</div><!-- end .col-left -->
					         <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebarchar.php'); ?>

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->