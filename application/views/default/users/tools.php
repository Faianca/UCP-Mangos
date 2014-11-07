<?php global $trans, $verify, $chars, $char, $session; ?>
<script type="text/javascript">
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
</script>
	</div><!-- end .centercolumn -->
		</div><!-- end #header-inner -->
	</div><!-- end #container-top -->
	
<div id="container-content">
		<div id="content-inner">
			<div class="centercolumn">
				<div id="page-title"><h1>Character Tools </h1></div><!-- end #page-title -->
				<div id="page-content">
					<div class="col-left">
					<?php 
				
					if($session->is_set('guid')): 
						if($chars->online($session->value('guid')) == '0'): ?>
			<h2>Choose one Below!</h2>
			<?php display_msg();?>
			<ul class="tabs">
			<li><a href="#tab1">Faction</a></li>
			<li><a href="#tab2">Name</a></li>
			<li><a href="#tab3">Sex</a></li>
			<li><a href="#tab4">Race</a></li>
			<li><a href="#tab5">Account</a></li>
			</ul>
            <div class="tab_container">
			<div id="tab1" class="tab_content">
			<h3>Change your character Faction - 500 <?php echo $lang['points']; ?></h3>
			<form action="" method="post">
			<table border="1" cellspacing="1" cellpadding="3">
			
	        <tr>
		<td>Races Available</td>
		<td>
			<select name="class">
	               <?php echo $verify->get_races(!$verify->get_faction($chars->get_race($session->value('guid'))),$chars->get_class($session->value('guid'))); ?>
			</select>
			<button type="submit" class="button" name="Mudar"><span><?php echo $lang['submit'] ?></span></button>
			</td>
			</tr>	
			</table>
		</form>
			</div>
			<div id="tab2" class="tab_content">
			<h3>Change your character name - 50 <?php echo $lang['points']; ?></h3>
			<?php $trans->get_form('name'); ?> 
			</div>
			<div id="tab3" class="tab_content">
			<h3>Change your character sex - 100 <?php echo $lang['points']?></h3>
			 <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<table border="1" cellspacing="1" cellpadding="3">
  
		<tr>
		<td>Sexos Disponiveis</td>
		<td>
			<select name="gender">
	            <option value="0">Male</option>
	            <option value="1">Female</option>	
				</select>
			<button type="submit" class="button" name="Sexo"><span><?php echo $lang['submit']?></span>
		</td>
		
	</tr>
	
</table>
</form>
			</div>

			<div id="tab4" class="tab_content">
			<h3>Change your character race - 150 <?php echo $lang['points']?></h3>
				 <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<table border="1" cellspacing="1" cellpadding="3">
	 
	<tr>
		<td>Races Available</td>
		<td>
			<select name="race">
	          <?php 
			  $verify->get_races($verify->get_faction($chars->get_race($_SESSION['guid'])),$chars->get_class($_SESSION['guid']));
			  ?>
				</select>
				<button type="submit" class="button" name="submit"><span><?php echo $lang['submit']?></span>
		</td>
		
	</tr>
	
</table>
</form>

			</div>

			<div id="tab5" class="tab_content">
			<h3>Change your character account - 50 <?php echo $lang['points']?></h3>
			<?php $trans->get_form('account'); ?>
			</div>
			</div>
			<?php else: ?>
	<span class='notice'>Your Character needs to be offline! </span>
<?php endif; ?>	
<?php else: ?>
	<span class='notice'>You need to choose one character first! </span>
<?php endif; ?>	
	<hr />
					</div><!-- end .col-left -->
					         <?php include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'sidebarchar.php'); ?>

					<div class="clear"></div>
				</div><!-- end #page-content -->
			</div><!-- end .centercolumn -->
		</div><!-- end #content-inner -->
	</div><!-- end #container-content -->

