<?php include_once('lang/englishlang.php');
global $session, $settings; 
$settings = $settings->get_settings();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="cufon-active cufon-ready">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Script-Type" content="text/javascript"> 

<meta name="robots" content="index, follow">
<meta name="keywords" content="">
<meta name="title" content="">
<meta name="description" content="">
<title><?php echo SITETITLE;?></title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<?php echo $html->includeCss('style'); ?>
<?php echo $html->includeCss('slide'); ?>
<?php echo ($css == 1) ? $html->includeCss('slider') : $html->includeCss('inner');  ?>
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<?php echo $html->includeJs('jquery-1.3.2.min'); ?>
<?php echo $html->includeJs('slide'); ?>
<?php echo $html->includeJs('cufon-yui'); ?>
<?php echo $html->includeJs('Vegur_400-Vegur_700.font'); ?>

<style type="text/css">cufon{text-indent:0!important;}@media screen,projection{cufon{display:inline!important;display:inline-block!important;position:relative!important;vertical-align:middle!important;font-size:1px!important;line-height:1px!important;}cufon cufontext{display:inline-block!important;width:0!important;height:0!important;overflow:hidden!important;text-indent:-10000in!important;}cufon canvas{position:relative!important;}}@media print{cufon{padding:0!important;}cufon canvas{display:none!important;}}</style>

<script type="text/javascript">
	 Cufon.replace('h1') ('h1 a') ('h2') ('h3') ('h4') ('h5') ('h6') ('blockquote') ('.styled') ('.styledbold');
</script>

<?php echo $html->includeJs('jcarousellite_1.0.1c4'); ?>
<?php echo $html->includeJs('swfobject'); ?>

<?php echo $html->includeJs('preloadImages'); ?>


<!--[if IE 6]>
<script src="js/DD_belatedPNG.js"></script>
<script>
  DD_belatedPNG.fix('img, #logo, .bginput, .butsearch, #bottom-glow');
</script>
<![endif]--> 
</head>
<body hkid="[object HTMLBodyElement]">
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome to <?php echo SITENAME; ?></h1>
				<h2>Important Broadcast</h2>		
				<p class="grey"><?php echo $html->broadcast(); ?></p>
					</div>
			<?php if(!$session->checklogin()): ?>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="<?php echo BASE_PATH;?>/page/login/" method="post">
					<h1>Member Login</h1>
					<label class="grey" for="log">Username:</label>
					<input class="field" type="text" name="username" id="log" value="" size="23" />
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="password" id="pwd" size="23" />
					<label><input name="remember" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="#">Lost your password?</a>
				</form>
			</div>
			<div class="left right">			
			<!-- Register Form -->
				<?php 
				$session->unlink_pin();
				$session->set('pin_value', md5(rand(2, 99999999)));
				$generated_pin = $session->generate_pin($session->value('pin_value'));
				$pin_image_output = $session->show_pin($session->value('pin_value'), $generated_pin);
				?>
				<form action="<?php echo BASE_PATH;?>/page/register/" method="post">
					<h2>Not a member yet? Sign Up!</h2>
					 <input type="hidden" name="register" value="1" />
					<label class="grey" for="signup">User:
					<input name="username" type="text"  id="user_name" class="field" size="45" maxlength="20" /></label>
					<label class="grey" for="email">Email:<input class="field" type="text" name="email" id="email" size="23" /></label>
					<label class="grey" for="pwd">Password:
					<input class="field" type="password" name="password" id="pwd" size="23" /></label>
					<label class="grey" for="pwd">Password:
					<input class="field" type="password" name="password2" id="pwd" size="23" />	</label>
					<label class="grey" for="pwd">Captcha:
				<input name="pin_submitted"  type="text" id="pin_submitted" size="15"  />
				<?php echo $pin_image_output;?></label>
				<input type="hidden" name="pin_generated" value="<?php echo $session->value('pin_value');?>" />					
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
			<?php else: ?>
					<div class="left">
				<h1>Services</h1>
				<label><h5><a href="<?php echo BASE_PATH;?>/users/tools/" style=""><img src="<?php echo $html->includeImage('icons/Person-add.png');?>" />Character Tools</a></h5></label>
				<label><h5><a href="<?php echo BASE_PATH;?>/vote/index/"><img src="<?php echo $html->includeImage('icons/Graph.png');?>" />Vote System</a></h5></label>
				<label><h5><a href="<?php echo BASE_PATH;?>/users/donate/"><img src="<?php echo $html->includeImage('icons/Heart-add.png');?>" />Donate System</a></h5></label>

			</div>
			<div class="left right">			
				<h1>Account</h1>
								<?php if($session->isAdmin() == $session->value('username')): ?> <label><h5><a href="<?php echo BASE_PATH;?>/admin/index/"><img src="<?php echo $html->includeImage('icons/Screen.png');?>" />Admin Panel</a></h5></label><?php endif; ?>

			<label><h5><a href="<?php echo BASE_PATH;?>/users/edit/"><img src="<?php echo $html->includeImage('icons/Paper-pencil.png');?>" />Edit Account</a></h5></label>
			<label><h5><a href="<?php echo BASE_PATH;?>/page/logout/"><img src="<?php echo $html->includeImage('icons/X.png');?>" />Logout</a></h5></label>

			</div>
			<?php endif; ?>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
		<?php if(!$session->checklogin()): ?>
			<li class="left">&nbsp;</li>
			<li>Hello Guest!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		<?php else: ?>
			<li class="left">&nbsp;</li>
			<li>Hello <?php echo $session->value('username');?>!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">My Account</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
			<li class="right">&nbsp;</li>
		<?php endif; ?>

		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->
<div style="height:23px;"></div>		
<div id="wrapper">
	<?php echo ($css == 1) ? "<div id=\"container-top\">" : "<div id=\"container-top-inner\">";  ?>
	
		<div id="top">
			<div class="centercolumn">
				<div id="top-navigation">
					<ul id="topnav">
						<li class="home"><?php echo $html->link('Home', ''); ?></li>
						<li class="home"><?php echo $html->link('Connect', 'page/connect/'); ?></li>
						<li class="home"><?php echo $html->link('News', 'page/news/'); ?></li>
						<li class="home"><?php echo $html->link('Statistics', 'page/stats/'); ?></li>
						<li class="home"><a href="<?php echo$settings['forum'];?>">Forum</a></li>
					</ul><!-- end #topnav -->
				</div><!-- end #top-navigation -->
				
			</div><!-- end .centercolumn -->
		</div><!-- end #top -->
		<?php echo ($css == 1) ? "<div id=\"header\" class=\"header3d\">" : "<div id=\"header-inner\">";  ?>
		<div class="centercolumn">
				<div id="header-top">
					<div id="logo"><img src="<?php echo $html->includeImage('logo.png'); ?>" alt=""></div><!-- end #logo -->
					<div id="slogan"><h1>User Cpanel</h1></div><!-- end #logo -->
				</div><!-- end #header-top -->
