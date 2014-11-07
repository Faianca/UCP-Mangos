<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>AdminTheme - Ultimate Admin Panel Solution</title> 
	<meta name="description" content="" /> 
    <meta name="keywords" content="" /> 
    <meta name="robots" content="index,follow" /> 
	<?php echo $html->includeaCss('style');?>
	<?php echo $html->includeaCss('jquery-ui-1.7.1.custom');?>
	<?php echo $html->includeaCss('superfish');?>
	<?php echo $html->includeaCss('style(1)');?>
	<?php echo $html->includeaCss('style(2)');?>

	<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]--> 
	<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen, projection" /><![endif]--> 
	
	<!--[if IE]>
		<style type="text/css">
		  .clearfix {
		    zoom: 1;     /* triggers hasLayout */
		    display: block;     /* resets display for IE/Win */
		    }  /* Only IE can see inside the conditional comment
		    and read this CSS rule. Don't ever use a normal HTML
		    comment inside the CC or it will close prematurely. */
		</style>
	<![endif]--> 
	<!-- JavaScript --> 
	<?php echo $html->includeaJs('jquery-1.3.2.min');?>
	<?php echo $html->includeaJs('jquery-ui-1.7.1.custom.min');?>
	<?php echo $html->includeaJs('hoverIntent');?>
	<?php echo $html->includeaJs('superfish');?>
	<script type="text/javascript"> 
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});
 
	</script>
<?php echo $html->includeaJs('excanvas.pack');?>
<?php echo $html->includeaJs('jquery.flot.pack');?>
<?php echo $html->includeaJs('jquery.markitup.pack');?>
<?php echo $html->includeaJs('set');?>
<?php echo $html->includeaJs('custom');?>	

 
	 <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]--> 
</head> 
<body> 
<div class="container" id="container"> 
    <div  id="header"> 
    	<div id="profile_info"> 
			<img src="<?php echo $html->includeaImage('avatar.jpg');?>" id="avatar" alt="avatar" /> 
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>.  <?php echo $html->link('Logout', 'page/logout/');?></p> 
			<p>System messages: 3. <a href="#">Read?</a></p> 
			<p class="last_login">Date: <?php echo date("F j, Y, g:i a");?></p> 
		</div> 
		<div id="logo"><h1><a href="/">AdmintTheme</a></h1></div> 
		
    </div><!-- end header --> 
	<div id="content" > 
	    <div id="top_menu" class="clearfix"> 
	    	<ul class="sf-menu"> <!-- DROPDOWN MENU --> 
			<li class="current"> 
				<?php echo $html->link('Home', 'admin/index/');?>
				<!-- First level MENU -->	
			</li> 
			<li> 
				<?php echo $html->link('News', 'admin/news/');?>
			</li> 
			<li> 
				<?php echo $html->link('Broadcast', 'admin/broadcast/');?>
			</li> 
			<li> 
				<a href="#">Vote System</a> 
				<ul> 
					<li> 
						<?php echo $html->link('Rewards', 'admin/rewards/');?> 
					</li> 
					<li> 
						<?php echo $html->link('Top Sites', 'admin/topsites/');?>
					
					</li> 
					
				</ul> 
			</li> 
			<li> 
				<?php echo $html->link('Donate System', 'admin/donate/');?>
			</li> 
			<li> 
				<?php echo $html->link('Bug Report', 'admin/reports/');?>
			</li> 
			
			<li> 
				<?php echo $html->link('Settings', 'admin/settings/');?>
			</li> 
			</ul> 
		
			<a href="<?php echo BASE_PATH;?>" id="visit" class="right">Visit site</a> 
	    </div> 
			<div id="content_main" class="clearfix"> 